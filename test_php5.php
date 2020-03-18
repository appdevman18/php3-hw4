<?php
$start = memory_get_usage();
echo $start.PHP_EOL;

$arr = range(1, 1000000);

$end = memory_get_usage();
echo $end.PHP_EOL;

$result = ($end - $start) / count($arr);

echo $result.PHP_EOL;
