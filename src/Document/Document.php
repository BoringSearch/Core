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
}
