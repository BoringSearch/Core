<?php

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Query\Result;

use BoringSearch\Core\Document\DocumentInterface;
use BoringSearch\Core\Query\QueryInterface;

class HighlightCollection
{
    /**
     * @var array<Highlight>
     */
    private array $highlights;

    /**
     * @param Highlight[] $highlights
     */
    public function __construct(array $highlights = [])
    {
        $this->highlights = $highlights;
    }

    public function add(Highlight $highlight): self
    {
        $this->highlights[] = $highlight;

        return $this;
    }

    /**
     * @return Highlight[]
     */
    public function getHighlights(): array
    {
        return $this->highlights;
    }

    public function equals(self $otherCollection): bool
    {
        if (\count($this->getHighlights()) !== \count($otherCollection->getHighlights())) {
            return false;
        }

        // Sort by attribute name and then start
        $sortHighlights = function (array & $highlights) {
            uasort($highlights, function (Highlight $a, Highlight $b) {
                if ($a->getAttributeName() === $a->getAttributeName()) {
                    // sort the higher start first
                    if ($a->getStart() > $b->getStart()) {
                        return 1;
                    }
                }

                return $a->getAttributeName() < $b->getAttributeName();
            });
        };

        $thisHighlights = $this->getHighlights();
        $otherHighlights = $otherCollection->getHighlights();
        $sortHighlights($thisHighlights);
        $sortHighlights($otherHighlights);

        return json_encode($thisHighlights) === json_encode($otherHighlights);
    }

    public static function createFromQueryAndDocument(QueryInterface $query, DocumentInterface $document): self
    {
        $highlightCollection = new self();
        $attributesToHighlight = [] === $query->getAttributesToHighlight()
            ? $document->getAttributes()->getAttributeNames()
            : $query->getAttributesToHighlight();

        foreach ($attributesToHighlight as $attributeName) {
            $attribute = $document->getAttributes()->getAttributeByName($attributeName);

            if (null === $attribute) {
                continue;
            }

            if (!\is_string($attribute->getValue())) {
                continue;
            }

            // TODO: Implement a better keyword highlighting matching regex here
            preg_match_all('/'.preg_quote($query->getSearchString(), '/').'/', $attribute->getValue(), $matches, PREG_OFFSET_CAPTURE);

            if (!isset($matches[0]) || 0 === \count($matches[0])) {
                continue;
            }

            foreach ($matches[0] as $match) {
                $highlightCollection->add(new Highlight($attributeName, $match[1], mb_strlen($match[0])));
            }
        }

        return $highlightCollection;
    }
}
