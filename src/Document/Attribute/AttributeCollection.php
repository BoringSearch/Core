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

class AttributeCollection implements \JsonSerializable
{
    /**
     * @var array<AttributeInterface>
     */
    private array $attributes;

    /**
     * @param array<AttributeInterface> $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function addAttribute(AttributeInterface $attribute): self
    {
        $this->attributes[$attribute->getName()] = $attribute;

        return $this;
    }

    public function removeAttribute(AttributeInterface $attribute): self
    {
        unset($this->attributes[$attribute->getName()]);

        return $this;
    }

    public function getAttributeByName(string $name): ?AttributeInterface
    {
        return $this->attributes[$name] ?? null;
    }

    public function getAttributeNames(): array
    {
        return array_keys($this->attributes);
    }

    /**
     * @return array<AttributeInterface>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        $data = [];

        foreach ($this->getAttributes() as $attribute) {
            $data[$attribute->getName()] = $attribute->getValue(); // TODO: might want to include the type here
        }

        return $data;
    }
}
