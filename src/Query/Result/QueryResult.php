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
    private ResultCollection $results;
    private int $numberOfResults;
    private bool $isNumberOfResultsApproximation;

    public function __construct(QueryInterface $query, ResultCollection $results, int $numberOfResults, bool $isNumberOfResultsApproximation)
    {
        $this->query = $query;
        $this->results = $results;
        $this->numberOfResults = $numberOfResults;
        $this->isNumberOfResultsApproximation = $isNumberOfResultsApproximation;
    }

    public function getResults(): ResultCollection
    {
        return $this->results;
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
