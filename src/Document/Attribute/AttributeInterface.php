<?php

declare(strict_types=1);

/*
 * This file is part of BoringSearch.
 *
 * (c) Yanick Witschi
 *
 * @license MIT
 */

namespace BoringSearch\Core\Document\Attribute;

interface AttributeInterface
{
    public function getName(): string;

    /**
     * Can be anything but must be JSON serializable.
     */
    public function getValue();

    /**
     * The type declaration of an attribute is optional but it can help indexes to optimize data storage.
     * Must be a valid PHP data type (scalar or FQCN).
     */
    public function getType(): ?string;
}
