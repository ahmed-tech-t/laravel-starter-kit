<?php

namespace AhmedTechT\Generator\Console\Commands;

use AhmedTechT\Generator\Utils\Paths;
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
        return $rootNamespace . '\\' . trim(Paths::CONTROLLER, '\\');
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

    function modelVar()
    {
        $model = $this->modelName();
        return lcfirst($model);
    }

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);
        $root = $this->laravel->getNamespace();

        $replacements = [
            '{{ baseControllerPath }}' => $root . Paths::CONTROLLER,
            '{{ baseServicePath }}' => $root . Paths::SERVICE,
            '{{ baseResourcePath }}' => $root . Paths::RESOURCE,
            '{{ baseRequestPath }}' => $root . Paths::REQUEST,
            '{{ model }}' => $this->modelName(),
            '{{ modelVar }}' => $this->modelVar(),
            '{{ name }}' => $this->getNameInput(),
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $stub);
    }
}
