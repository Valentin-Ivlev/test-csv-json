<?php

class TreeGenerator
{
    private array $elements;

    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    public function generateTree(): array
    {
        $tree = [];

        foreach ($this->elements as $element) {
            if (!$element->isDirectComponent() && $element->parent === null) {
                $tree[] = $this->buildSubtree($element);
            }
        }

        return $tree;
    }

    private function buildSubtree(TreeElement $element): array
    {
        $subtree = [
            'itemName' => $element->itemName,
            'parent' => $element->parent === null ? null : $element->parent,
            'children' => []
        ];

        foreach ($this->elements as $childElement) {
            if ($childElement->parent === $element->itemName) {
                $subtree['children'][] = $this->buildSubtree($childElement);
            }
        }

        return $subtree;
    }
}
