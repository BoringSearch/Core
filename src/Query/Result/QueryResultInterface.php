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

interface QueryResultInterface
{
    /**
     * Contains the search query matches.
     *
     * @return array<ResultInterface>
     */
    public function getMatches(): array;

    /**
     * Contains the number of matches. Might be an approximation, see isNumberOfMatchesApproximation().
     */
    public function getNumberOfMatches(): int;

    /**
     * Search engines might not return the exact number of matches for certain query results but only
     * an approximation. In this case, this method shall return true.
     */
    public function isNumberOfMatchesApproximation(): bool;

    /**
     * Contains the original query.
     */
    public function getQuery(): QueryInterface;
}
