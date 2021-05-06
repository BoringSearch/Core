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

use BoringSearch\Core\Adapter\AdapterInterface;
use BoringSearch\Core\Document\DocumentInterface;
use BoringSearch\Core\Index\Result\ResultInterface;
use BoringSearch\Core\Query\QueryInterface;
use BoringSearch\Core\Query\Result\QueryResultInterface;

interface IndexInterface
{
    public function getName(): string;

    public function getAdapter(): AdapterInterface;

    public function query(QueryInterface $query): QueryResultInterface;

    public function findByIdentifier(string $identifier): ?DocumentInterface;

    /**
     * @param array<DocumentInterface> $documents
     */
    public function index(array $documents, bool $forceSynchronous = false): ResultInterface;

    public function delete(array $identifiers, bool $forceSynchronous = false): ResultInterface;

    public function purge(bool $forceSynchronous = false): ResultInterface;
}
