<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MonthlyStatisticReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:statistics-report-monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends monthly website statistics to all admin emails';

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
        // grab statistics from db

        // send email using an email view
    }
}
