<?php

namespace AhmedTechT\Generator\Console\Commands;

use AhmedTechT\Generator\Utils\Paths;
use Illuminate\Console\GeneratorCommand;

class CreateRepoImpCommand extends GeneratorCommand
{

    protected $signature = 'make:repoImpl {name}';

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/../../../stubs/c.repo.impl.stub';
    }


    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . trim(Paths::REPO_IMPL, '\\');
    }


    protected function getNameInput()
    {
        $name = trim($this->argument('name'));
        $formattedName = str_ends_with($name, 'Repo') ? $name : $name . 'Repo';
        return 'E' . $formattedName;
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
            '{{ baseRepoPath }}' => $root . Paths::REPO,
            '{{ baseRepoImplPath }}' => $root . Paths::REPO_IMPL,
            '{{ baseModelPath }}' => $root . Paths::MODEL,
            '{{ baseMapperPath }}' => $root . Paths::MAPPER,
            '{{name}}' => $this->getNameInput(),
            '{{model}}' => $this->modelName(),
        ];



        return str_replace(array_keys($replacements), array_values($replacements), $stub);
    }
}
