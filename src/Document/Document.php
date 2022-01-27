<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Document;

use BoringSearch\Core\Document\Attribute\AttributeCollection;
use BoringSearch\Core\Document\Attribute\AttributeInterface;

class Document implements DocumentInterface
{
    private string $identifier;

    private AttributeCollection $attributes;

    /**
     * @param array<AttributeInterface> $attributes
     */
    public function __construct(string $identifier, AttributeCollection $attributes)
    {
        $this->identifier = $identifier;
        $this->attributes = $attributes;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getAttributes(): AttributeCollection
    {
        return $this->attributes;
    }

    public function equals(DocumentInterface $document): bool
    {
        if ($this->getIdentifier() !== $document->getIdentifier()) {
            return false;
        }

        if ($this->getAttributeNames($this) !== $this->getAttributeNames($document)) {
            return false;
        }

        $documentAttributes = $document->getAttributes();

        foreach ($this->getAttributes() as $attribute) {
            $documentAttribute = $documentAttributes->getAttributeByName($attribute->getName());

            if ($attribute->getType() !== $documentAttribute->getType()) {
                return false;
            }

            if ($attribute->getValue() !== $documentAttribute->getValue()) {
                return false;
            }
        }

        return true;
    }

    private function getAttributeNames(DocumentInterface $document): array
    {
        $names = [];

        foreach ($document->getAttributes() as $attribute) {
            $names[] = $attribute->getName();
        }

        sort($names);

        return $names;
    }

    public function withoutAttributes(...$names): self
    {
        $clone = clone $this;

        foreach ($names as $name) {
            $clone = $clone->withoutAttribute($name);
        }

        return $clone;
    }

    public function withoutAttribute(string $name): self
    {
        // Already removed, don't do anything
        if (null === ($attribute = $this->getAttributes()->getAttributeByName($name))) {
            return $this;
        }

        // Otherwise clone and remove
        $clone = clone $this;
        $clone->getAttributes()->removeAttribute($attribute);

        return $clone;
    }
}
