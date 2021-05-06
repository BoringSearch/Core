<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Index;

use BoringSearch\Core\Index\Result\AsynchronousResultInterface;
use BoringSearch\Core\Index\Result\ResultInterface;

interface AsynchronousResultsIndexInterface
{
    public function waitForAsynchronousResult(AsynchronousResultInterface $asynchronousResult): ResultInterface;
}
