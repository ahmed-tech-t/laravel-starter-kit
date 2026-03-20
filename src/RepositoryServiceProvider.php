<?php

namespace AhmedTechT\Generator;

use AhmedTechT\Generator\Utils\Paths;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $interfacePath = app_path('Domain/Repo');
        $implementationPath = 'App\\Infrastructure\\Persistence\\repo\\';

        // Check if directory exists to avoid errors during first-time setup
        if (File::exists($interfacePath)) {
            $files = File::allFiles($interfacePath);

            foreach ($files as $file) {
                $interfaceName = $file->getBasename('.php');
                $interfaceNamespace = 'App\\Domain\\Repo\\' . $interfaceName;
                $implementationNamespace = $implementationPath . 'E' . $interfaceName;

                // 3. Bind them if the implementation class actually exists
                if (class_exists($implementationNamespace)) {
                    logger()->info('Binding ' . $interfaceName . ' to ' . $implementationNamespace);
                    $this->app->bind($interfaceNamespace, $implementationNamespace);
                }
            }
        }
    }

    public function boot(): void
    {
        $projectNamespace = $this->app->getNamespace(); // usually "App\"
        $targetController = $projectNamespace . Paths::CONTROLLER . '\Controller';

        // 2. Create an alias so your package can find it under a static name
        if (class_exists($targetController)) {
            class_alias($targetController, 'AhmedTechT\Generator\Base\ProjectBaseController');
        }
    }
}
