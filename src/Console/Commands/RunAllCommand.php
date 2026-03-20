<?php

namespace AhmedTechT\Generator\Console\Commands;

use AhmedTechT\Generator\Utils\Paths;
use Illuminate\Console\Command;

class RunAllCommand extends Command
{
    // The name and signature of the console command
    protected $signature = 'create {name}';


    public function handle()
    {
        $name = $this->argument('name');
        $root = $this->laravel->getNamespace();

        $this->info("Building the $name empire...");

        $this->call('make:model', ['name' => $root . Paths::MODEL . $name, '-m' => true]);
        $this->call('make:entity', ['name' => $name]);
        $this->call('make:mapper', ['name' => $name]);
        $this->call('make:dto', ['name' => $name]);
        $this->call('make:repo', ['name' => $name]);
        $this->call('make:repoImpl', ['name' => $name]);
        $this->call('make:service', ['name' => $name]);
        $this->call('make:request', ['name' => $root . Paths::REQUEST . '/' . $name . '/Create' . $name . 'Request']);
        $this->call('make:request', ['name' => $root . Paths::REQUEST . '/' . $name . '/Update' . $name . 'Request']);
        $this->call('make:resource', ['name' => $root . Paths::RESOURCE . '/' . $name . 'Resource']);
        $this->call('make:controller', ['name' => $name]);
    }
}