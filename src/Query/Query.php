<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Query;

class Query implements QueryInterface
{
    private string $searchString;
    private int $limit = 20; // 20 seems like a sensible default
    private int $offset = 0;
    private array $attributeNamesToRetrieve = [];
    private array $attributesToHighlight = [];

    public function __construct(string $searchString)
    {
        $this->searchString = $searchString;
    }

    public function getSearchString(): string
    {
        return $this->searchString;
    }

    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function setAttributeNamesToRetrieve(array $attributeNamesToRetrieve): self
    {
        $this->attributeNamesToRetrieve = $attributeNamesToRetrieve;

        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getAttributeNamesToRetrieve(): array
    {
        return $this->attributeNamesToRetrieve;
    }

    public function getAttributesToHighlight(): array
    {
        return $this->attributesToHighlight;
    }

    public function setAttributesToHighlight(array $attributesToHighlight): void
    {
        $this->attributesToHighlight = $attributesToHighlight;
    }
}
