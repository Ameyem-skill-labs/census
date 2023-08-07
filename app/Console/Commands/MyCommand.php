<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SeedController;

class MyCommand extends Command
{
    protected $signature = 'users:create';

    protected $description = 'Create users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $controller = new SeedController();
        $controller->createusers();
    }
}
