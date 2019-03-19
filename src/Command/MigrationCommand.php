<?php namespace Labsys\GaiaAuth\Command;

/**
 * This file is part of auth-gaia,
 * a role & permission management solution for labsys.
 *
 * @license MIT
 * @package Labsys\auth-gaia
 */

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MigrationCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'gaia:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a migration following the GaiaAuth specifications.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->handle();
    }

    /**
     * Execute the console command for Laravel 5.5+.
     *
     * @return void
     */
    public function handle()
    {
        echo 'this is an uncompleted console of GaiaAuth for Later Extension Development';
    }

}
