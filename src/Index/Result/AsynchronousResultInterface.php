<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Index\Result;

interface AsynchronousResultInterface extends ResultInterface
{
    public function getTaskIdentifier(): string;
}
