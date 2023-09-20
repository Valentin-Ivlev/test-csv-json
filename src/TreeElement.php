<?php

class TreeElement
{
    public string $itemName;
    public string $parent;
    public array $children;

    public function __construct(string $itemName, ?string $parent)
    {
        $this->itemName = $itemName;
        $this->parent = $parent === '' ? null : $parent;
        $this->children = [];
    }

    public function isDirectComponent(): bool
    {
        return $this->parent !== null && $this->parent !== '' && $this->itemName !== $this->parent;
    }
}
