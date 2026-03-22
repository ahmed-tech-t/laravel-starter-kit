<?php

namespace AhmedTechT\Generator\Console\Commands;

use AhmedTechT\Generator\Utils\Paths;
use Illuminate\Console\GeneratorCommand;

class CreateServiceCommand extends GeneratorCommand
{

    protected $signature = 'make:service {name}';

    protected function getStub()
    {
        return __DIR__ . '/../../../stubs/c.service.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . trim(Paths::SERVICE, '\\');
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));
        return str_ends_with($name, 'Service') ? $name : $name . 'Service';
    }

    function modelName()
    {
        return trim($this->argument('name'));
    }


    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);
        $root = $this->laravel->getNamespace();

        $replacements = [
            '{{ baseServicePath }}' => $root . Paths::SERVICE,
            '{{ baseEntityPath }}' => $root . Paths::ENTITY,
            '{{ baseRepoPath }}' => $root . Paths::REPO,
            '{{ name }}' => $this->getNameInput(),
            '{{ model }}' => $this->modelName(),
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $stub);
    }
}
