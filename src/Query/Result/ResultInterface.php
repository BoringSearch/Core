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

// TODO: extend with typical match information like highlights / match context etc.
interface ResultInterface
{
    public function getDocument(): DocumentInterface;
}
