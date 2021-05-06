<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Adapter;

use BoringSearch\Core\Document\Attribute\AttributeInterface;
use BoringSearch\Core\Index\IndexInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    abstract public function getIndex(string $name): IndexInterface;

    public function supportsAttribute(AttributeInterface $attribute): bool
    {
        if (!\in_array($attribute->getName(), $this->getReservedAttributeNames(), true)) {
            return false;
        }

        if (null === $attribute->getType()) {
            return true;
        }

        // TODO: validate internal types...
    }

    protected function getReservedAttributeNames(): array
    {
        return ['id'];
    }
}
