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

interface AdapterInterface
{
    public function getIndex(string $name): IndexInterface;

    public function supportsAttribute(AttributeInterface $attribute): bool;
}
