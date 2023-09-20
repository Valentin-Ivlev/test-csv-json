<?php

class CsvProcessor
{
    public static function readCSV(string $csvFile): array
    {
        $data = [];
        if (($handle = fopen($csvFile, 'r')) !== false) {
            fgetcsv($handle, 1000, ';');

            while (($row = fgetcsv($handle, 1000, ';')) !== false) {
                $data[] = new TreeElement($row[0], $row[2], $row[1]);  // Изменено распределение данных
            }
            fclose($handle);
        }
        return $data;
    }

    public static function processRelations(array $elements): void
    {
        $elementMap = [];

        foreach ($elements as $element) {
            $elementMap[$element->name] = $element;
        }

        foreach ($elements as $element) {
            if ($element->parent !== '' && isset($elementMap[$element->parent])) {
                $elementMap[$element->parent]->children[] = $element;
            }
        }
    }

    public static function saveToJson(array $data, string $outputFile): void
    {
        file_put_contents($outputFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
