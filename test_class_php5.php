<?php

class TestClass
{
    public $value;
    public $self;
}


$start = memory_get_usage();
echo 'start:'.$start.PHP_EOL;

for ($i = 1; $i <= 100000; $i++) {

    $obj = new TestClass();
    $obj->value = rand(0, 10);
    $obj->self = $obj;

    if ($i % 500 === 0) {

        $end = memory_get_usage();

        $result = $end - $start;
        echo 'result:'.$result.PHP_EOL;
    }

}
echo memory_get_peak_usage().PHP_EOL;