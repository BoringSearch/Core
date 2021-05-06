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
use BoringSearch\Core\Index\Result\AsynchronousResultInterface;
use BoringSearch\Core\Index\Result\ResultInterface;
use BoringSearch\Core\Query\QueryInterface;
use BoringSearch\Core\Query\Result\QueryResultInterface;

abstract class AbstractIndex implements IndexInterface
{
    protected AdapterInterface $adapter;
    protected string $name;

    public function __construct(AdapterInterface $adapter, string $name)
    {
        $this->adapter = $adapter;
        $this->name = $name;
    }

    public function getAdapter(): AdapterInterface
    {
        return $this->adapter;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function query(QueryInterface $query): QueryResultInterface;

    /**
     * @param array<DocumentInterface> $documents
     */
    public function index(array $documents, bool $forceSynchronous = false): ResultInterface
    {
        foreach ($documents as $document) {
            foreach ($document->getAttributes() as $attribute) {
                if (!$this->getAdapter()->supportsAttribute($attribute)) {
                    throw new \InvalidArgumentException(sprintf('The attribute "%s" of document ID "%s" is not supported or reserved by this adapter.', $attribute->getName(), $document->getIdentifier())); // TODO: more specific exceptions
                }
            }
        }

        return $this->handleSynchronousExecution($forceSynchronous, $this->doIndex($documents));
    }

    public function delete(array $identifiers, bool $forceSynchronous = false): ResultInterface
    {
        return $this->handleSynchronousExecution($forceSynchronous, $this->doDelete($identifiers));
    }

    public function purge(bool $forceSynchronous = false): ResultInterface
    {
        return $this->handleSynchronousExecution($forceSynchronous, $this->doPurge());
    }

    protected function handleSynchronousExecution(bool $forceSynchronous, ResultInterface $result): ResultInterface
    {
        if (!$forceSynchronous) {
            return $result;
        }

        if ($this instanceof AsynchronousResultsIndexInterface && $result instanceof AsynchronousResultInterface) {
            $result = $this->waitForAsynchronousResult($result);
        }

        return $result;
    }

    /**
     * @param array<DocumentInterface> $documents
     */
    abstract protected function doIndex(array $documents): ResultInterface;

    abstract protected function doDelete(array $identifiers): ResultInterface;

    abstract protected function doPurge(): ResultInterface;
}
