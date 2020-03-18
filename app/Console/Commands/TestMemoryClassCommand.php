<?php

namespace App\Console\Commands;

use App\Models\TestClass;
use Illuminate\Console\Command;

class TestMemoryClassCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test class memory';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
    }
}

