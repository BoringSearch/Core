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
     * Contains the search query results.
     */
    public function getResults(): ResultCollection;

    /**
     * Contains the number of results. Might be an approximation, see isNumberOfResultsApproximation().
     */
    public function getNumberOfResults(): int;

    /**
     * Search engines might not return the exact number of matches for certain query results but only
     * an approximation. In this case, this method shall return true.
     */
    public function isNumberOfResultsApproximation(): bool;

    /**
     * Contains the original query.
     */
    public function getQuery(): QueryInterface;
}
