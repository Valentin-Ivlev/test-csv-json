<?php

use PHPUnit\Framework\TestCase;

class ComparisonTest extends TestCase
{
    public function testGeneratedOutputMatchesExample()
    {
        $generatedOutput = file_get_contents('output.json');

        $exampleOutput = file_get_contents('output-etalon.json');

        $this->assertJsonStringEqualsJsonString($exampleOutput, $generatedOutput);
    }
}
