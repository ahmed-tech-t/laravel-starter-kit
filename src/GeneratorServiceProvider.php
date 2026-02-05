<?php
namespace AhmedTechT\Generator;

use Illuminate\Support\ServiceProvider;
// استدعي الكوماندز من داخل الباكيدج نفسها وليس من App
use AhmedTechT\Generator\Console\Commands\RunAllCommand;
use AhmedTechT\Generator\Console\Commands\CreateServiceCommand;
use AhmedTechT\Generator\Console\Commands\CreateControllerCommand;
use AhmedTechT\Generator\Console\Commands\CreateDtoCommand;
use AhmedTechT\Generator\Console\Commands\CreateEntityCommand;
use AhmedTechT\Generator\Console\Commands\CreateMapperCommand;
use AhmedTechT\Generator\Console\Commands\CreateRepoImpCommand;
use AhmedTechT\Generator\Console\Commands\CreateRepositoryCommand;
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