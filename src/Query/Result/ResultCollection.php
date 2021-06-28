<?php

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Query\Result;

class ResultCollection
{
    /**
     * @var array<ResultInterface>
     */
    private array $results;

    /**
     * @param ResultInterface[] $results
     */
    public function __construct(array $results)
    {
        $this->results = $results;
    }

    /**
     * @return ResultInterface[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    public function findResultForDocumentIdentifier(string $identifier): ?ResultInterface
    {
        foreach ($this->getResults() as $result) {
            if ($result->getDocument()->getIdentifier() === $identifier) {
                return $result;
            }
        }

        return null;
    }

    public function equals(self $otherCollection): bool
    {
        if (\count($this->getResults()) !== \count($otherCollection->getResults())) {
            return false;
        }

        foreach ($this->getResults() as $result) {
            $otherResult = $otherCollection->findResultForDocumentIdentifier($result->getDocument()->getIdentifier());
            if (null === $otherResult) {
                return false;
            }

            if (!$result->getDocument()->equals($otherResult->getDocument())) {
                return false;
            }
        }

        return true;
    }
}
