<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MonthlyDatabaseCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:monthly-db-cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archives older posts';

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
        // moves any posts older than 1 month to the archives table
    }
}
