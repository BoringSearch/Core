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

interface QueryInterface
{
    /**
     * Usually the search string entered by a user.
     */
    public function getSearchString(): string;

    /**
     * The maximum number of matches that shall be returned.
     * A limit of 0 results in all matches to be returned.
     */
    public function getLimit(): int;

    /**
     * The offset number of matches that shall be skipped.
     */
    public function getOffset(): int;

    /**
     * Sometimes one might not be interested in all attributes
     * of a document. This method allows to specify them.
     * An empty array means retrieve all attributes.
     *
     * @return array<string>
     */
    public function getAttributeNamesToRetrieve(): array;

    /**
     * Sometimes one might not be interested in all attributes
     * of a document to have highlighted keywords. This method allows to specify them.
     * An empty array means highlight keywords all attributes.
     *
     * @return array<string>
     */
    public function getAttributesToHighlight(): array;

    // TODO: Filters
}
