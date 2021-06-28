<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Query\Result;

use BoringSearch\Core\Document\DocumentInterface;

class Result implements ResultInterface
{
    private DocumentInterface $document;
    private HighlightCollection $highlights;

    public function __construct(DocumentInterface $document, HighlightCollection $highlights)
    {
        $this->document = $document;
        $this->highlights = $highlights;
    }

    public function getDocument(): DocumentInterface
    {
        return $this->document;
    }

    public function getHighlights(): HighlightCollection
    {
        return $this->highlights;
    }

    public function equals(ResultInterface $other): bool
    {
        if (!$this->getDocument()->equals($other->getDocument())) {
            return false;
        }

        if (!$this->getHighlights()->equals($other->getHighlights())) {
            return false;
        }

        return true;
    }
}
