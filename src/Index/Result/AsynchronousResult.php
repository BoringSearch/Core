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

class AsynchronousResult extends SynchronousResult implements AsynchronousResultInterface
{
    private string $taskIdentifier;

    public function __construct(bool $wasSuccessful, string $taskIdentifier)
    {
        $this->taskIdentifier = $taskIdentifier;

        parent::__construct($wasSuccessful);
    }

    public function getTaskIdentifier(): string
    {
        return $this->taskIdentifier;
    }
}
