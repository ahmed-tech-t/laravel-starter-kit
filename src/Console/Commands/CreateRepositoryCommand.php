<?php

namespace AhmedTechT\Generator\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CreateRepositoryCommand extends GeneratorCommand
{

    protected $signature = 'make:repo {name}';


    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/../../../stubs/c.repo.stub';
    }


    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Domain\Repo';
    }


    protected function replaceInsideStub($stub, $name)
    {
        return str_replace('{{ name }}', $name, $stub);
    }


    protected function getNameInput()
    {
        $name = trim($this->argument('name'));

        return str_ends_with($name, 'Repo') ? $name : $name . 'Repo';
    }


    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $nameInput = $this->getNameInput();
        return str_replace('{{ name }}', $nameInput, $stub);
    }
}
