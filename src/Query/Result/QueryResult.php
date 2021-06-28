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

use BoringSearch\Core\Query\QueryInterface;

class QueryResult implements QueryResultInterface
{
    private QueryInterface $query;
    /**
     * @var array<ResultInterface>
     */
    private array $matches;
    private int $numberOfResults;
    private bool $isNumberOfResultsApproximation;

    /**
     * @param array<ResultInterface> $matches
     */
    public function __construct(QueryInterface $query, array $matches, int $numberOfResults, bool $isNumberOfResultsApproximation)
    {
        $this->query = $query;
        $this->matches = $matches;
        $this->numberOfResults = $numberOfResults;
        $this->isNumberOfResultsApproximation = $isNumberOfResultsApproximation;
    }

    /**
     * @return array<ResultInterface>
     */
    public function getResults(): array
    {
        return $this->matches;
    }

    public function getNumberOfResults(): int
    {
        return $this->numberOfResults;
    }

    public function isNumberOfResultsApproximation(): bool
    {
        return $this->isNumberOfResultsApproximation;
    }

    public function getQuery(): QueryInterface
    {
        return $this->query;
    }
}
