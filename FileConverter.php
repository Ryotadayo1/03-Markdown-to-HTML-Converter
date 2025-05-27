<?php
if ($argc !== 4 || $argv[1] !== 'markdown') {
    echo "Usage: php FileConverter.php markdown input.md output.html\n";
    exit(1);
}

$inputFile = $argv[2];
$outputFile = $argv[3];

if (!file_exists($inputFile)) {
    echo "Error: Input file not found.\n";
    exit(1);
}

require 'vendor/autoload.php';

$markdownContent = file_get_contents($inputFile);
$parsedown = new Parsedown();
$html = $parsedown->text($markdownContent);

$htmlDocument = "<!DOCTYPE html>\n<html>\n<head><meta charset=\"UTF-8\"><title>Markdown</title></head>\n<body>\n$html\n</body>\n</html>";

file_put_contents($outputFile, $htmlDocument);

echo "✅ HTMLファイルを生成しました: $outputFile\n";
