<?php

require_once 'src/TreeElement.php';
require_once 'src/TreeGenerator.php';
require_once 'src/CsvProcessor.php';

if ($argc !== 3) {
    echo "Usage: php gentree.php <input.csv> <output.json>\n";
    exit(1);
}

$inputFile = $argv[1];
$outputFile = $argv[2];

$elements = CsvProcessor::readCSV($inputFile);
CsvProcessor::processRelations($elements);

$treeGenerator = new TreeGenerator($elements);
$tree = $treeGenerator->generateTree();

$output = json_encode($tree, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents($outputFile, $output);

echo "JSON generated and saved to $outputFile\n";

?>
