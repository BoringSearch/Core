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

use BoringSearch\Core\Document\DocumentInterface;

interface ResultInterface
{
    public function getDocument(): DocumentInterface;

    public function getHighlights(): HighlightCollection;

    public function equals(self $result): bool;
}
