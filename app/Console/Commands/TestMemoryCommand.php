<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestMemoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:memory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test memory';

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
        echo $start.PHP_EOL;

        $arr = range(1, 1000000);

        $end = memory_get_usage();
        echo $end.PHP_EOL;

        $result = ($end - $start) / count($arr);

        echo $result.PHP_EOL;
    }
}
