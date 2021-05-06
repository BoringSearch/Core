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

class Attribute implements AttributeInterface
{
    private string $name;
    private $value;
    private ?string $type;

    public function __construct(string $name, $value, ?string $type = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
