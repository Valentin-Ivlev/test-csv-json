# Test-CSV-JSON

1. composer install
2. запуск: php php gentree.php <input.csv> <output.json>
3. в файле /tests/ComparisonTest.php прописать пути до сгенерированного JSON файла output.json и до эталонного output-etalon.json
4. запуск теста: vendor/bin/phpunit tests   
