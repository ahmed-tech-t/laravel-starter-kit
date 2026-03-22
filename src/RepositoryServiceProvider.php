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
    // 1. Define base paths using the Paths constants
    $interfacePath = app_path(str_replace('\\', '/', Paths::REPO));
    $implementationNamespacePrefix = $this->app->getNamespace() . Paths::REPO_IMPL . '\\';

    // 2. Check if directory exists to avoid errors
    if (File::exists($interfacePath)) {
        $files = File::allFiles($interfacePath);

        foreach ($files as $file) {
            $interfaceName = $file->getBasename('.php');
            
            // Construct the full Interface and Implementation names
            $interfaceNamespace = $this->app->getNamespace() . Paths::REPO . '\\' . $interfaceName;
            
            // Your logic adds 'E' prefix (e.g., UserRepository -> EUserRepository)
            $implementationNamespace = $implementationNamespacePrefix . 'E' . $interfaceName;

            // 3. Bind them if the implementation class actually exists
            if (class_exists($implementationNamespace)) {
                logger()->info("Binding $interfaceName to $implementationNamespace");
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
