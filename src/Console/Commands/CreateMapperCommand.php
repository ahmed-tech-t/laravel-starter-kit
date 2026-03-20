<?php

namespace AhmedTechT\Generator\Console\Commands;

use AhmedTechT\Generator\Utils\Paths;
use Illuminate\Console\GeneratorCommand;

class CreateMapperCommand extends GeneratorCommand
{

    protected $signature = 'make:mapper {name}';

    protected function getStub()
    {
        return __DIR__ . '/../../../stubs/c.mapper.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . trim(Paths::MAPPER, '\\');
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));
        return str_ends_with($name, 'Mapper') ? $name : $name . 'Mapper';
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
            '{{ baseMapperPath }}' => $root . Paths::MAPPER,
            '{{ baseEntityPath }}' => $root . Paths::ENTITY,
            '{{ name }}' => $this->getNameInput(),
            '{{ model }}' => $this->modelName()
        ];


        return str_replace(array_keys($replacements), array_values($replacements), $stub);
    }
}
