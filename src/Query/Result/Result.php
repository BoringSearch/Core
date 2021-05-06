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

class Result implements ResultInterface
{
    private DocumentInterface $document;

    public function __construct(DocumentInterface $document)
    {
        $this->document = $document;
    }

    public function getDocument(): DocumentInterface
    {
        return $this->document;
    }
}
