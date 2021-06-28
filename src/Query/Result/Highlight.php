<?php

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Query\Result;

class Highlight implements \JsonSerializable
{
    private string $attributeName;
    private int $start;
    private int $length;

    /**
     * Highlight constructor.
     */
    public function __construct(string $attributeName, int $start, int $length)
    {
        $this->attributeName = $attributeName;
        $this->start = $start;
        $this->length = $length;
    }

    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    public function getStart(): int
    {
        return $this->start;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function jsonSerialize(): array
    {
        return [
            'attributeName' => $this->attributeName,
            'start' => $this->start,
            'length' => $this->length,
        ];
    }
}
