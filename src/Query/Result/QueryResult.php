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
    private int $numberOfMatches;
    private bool $isNumberOfMatchesApproximation;

    /**
     * @param array<ResultInterface> $matches
     */
    public function __construct(QueryInterface $query, array $matches, int $numberOfMatches, bool $isNumberOfMatchesApproximation)
    {
        $this->query = $query;
        $this->matches = $matches;
        $this->numberOfMatches = $numberOfMatches;
        $this->isNumberOfMatchesApproximation = $isNumberOfMatchesApproximation;
    }

    /**
     * @return array<ResultInterface>
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    public function getNumberOfMatches(): int
    {
        return $this->numberOfMatches;
    }

    public function isNumberOfMatchesApproximation(): bool
    {
        return $this->isNumberOfMatchesApproximation;
    }

    public function getQuery(): QueryInterface
    {
        return $this->query;
    }
}
