<?php
namespace Rashed\Generator;

use Illuminate\Support\ServiceProvider;
// استدعي الكوماندز من داخل الباكيدج نفسها وليس من App
use Rashed\Generator\Console\Commands\RunAllCommand;
use Rashed\Generator\Console\Commands\CreateServiceCommand;
use Rashed\Generator\Console\Commands\CreateControllerCommand;
use Rashed\Generator\Console\Commands\CreateDtoCommand;
use Rashed\Generator\Console\Commands\CreateEntityCommand;
use Rashed\Generator\Console\Commands\CreateMapperCommand;
use Rashed\Generator\Console\Commands\CreateRepoImpCommand;
use Rashed\Generator\Console\Commands\CreateRepositoryCommand;
// استدعي كل الـ Commands بتاعتك هنا

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * الكل هينده هنا أول ما الباكيدج تتحمل
     */
    public function register()
    {
        // هنا ممكن تربط (Bind) أي كلاسات ببعضها لو محتاج
    }


    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                RunAllCommand::class,
                CreateServiceCommand::class,
                CreateControllerCommand::class,
                CreateDtoCommand::class,
                CreateEntityCommand::class,
                CreateMapperCommand::class,
                CreateRepoImpCommand::class,
                CreateRepositoryCommand::class
            ]);
        }
    }
}