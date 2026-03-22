<?php

namespace AhmedTechT\Generator\Console\Commands;

use AhmedTechT\Generator\Utils\Paths;
use Illuminate\Console\GeneratorCommand;

class CreateDtoCommand extends GeneratorCommand
{

    protected $signature = 'make:dto {name}';

    protected function getStub()
    {
        return __DIR__ . '/../../../stubs/c.dto.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . trim(Paths::DTO, '\\');
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));
        return $name . 'Dto';
    }

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);
        $root = $this->laravel->getNamespace();

        $nameInput = $this->getNameInput();

        $replacements = [
            '{{ baseDtoPath }}' => $root . Paths::DTO,
            '{{ name }}' => $nameInput
        ];

        return str_replace(
            array_keys($replacements),
            array_values($replacements),
            $stub
        );

    }
}
