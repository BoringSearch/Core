<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Document;

use BoringSearch\Core\Document\Attribute\AttributeCollection;

interface DocumentInterface
{
    public function getIdentifier(): string;

    public function getAttributes(): AttributeCollection; // TODO: do we need an interface here?

    public function equals(self $document): bool;
}
