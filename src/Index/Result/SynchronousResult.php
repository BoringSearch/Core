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

class SynchronousResult implements ResultInterface
{
    private bool $wasSuccessful;

    public function __construct(bool $wasSuccessful)
    {
        $this->wasSuccessful = $wasSuccessful;
    }

    public function wasSuccessful(): bool
    {
        return $this->wasSuccessful;
    }
}
