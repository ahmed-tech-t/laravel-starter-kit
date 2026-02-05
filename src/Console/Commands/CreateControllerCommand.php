<?php

namespace Rashed\Generator\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CreateControllerCommand extends GeneratorCommand
{

    protected $signature = 'make:controller {name}';

    protected function getStub()
    {
        return __DIR__ . '/../../../stubs/c.controller.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Interfaces\Http\Controllers';
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));
        return str_ends_with($name, 'Controller') ? $name : $name . 'Controller';
    }

    function modelName()
    {
        return trim($this->argument('name'));
    }


    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $nameInput = $this->getNameInput();
        $model = $this->modelName();

        $stub = str_replace('{{ name }}', $nameInput, $stub);

        $stub = str_replace('{{ model }}', $model, $stub);
        return $stub;
    }
}
