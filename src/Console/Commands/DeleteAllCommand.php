<?php

namespace AhmedTechT\Generator\Console\Commands;

use AhmedTechT\Generator\Utils\Paths;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteAllCommand extends Command
{
    // Suggested signature: delete {name}
    protected $signature = 'delete {name}';

    protected $description = 'Remove all architectural layers for a specific resource';

    public function handle()
    {
        $name = $this->argument('name');
        $root = $this->laravel->getNamespace();

        if (!$this->confirm("Are you sure you want to delete the $name empire? This cannot be undone.", true)) {
            return;
        }

        $this->warn("Dismantling $name...");

        // 1. Delete standard Laravel files using built-in paths
        // Models and Migrations (Note: This doesn't delete the migration file itself unless you find the specific timestamped file)
        $this->deleteFile(app_path('Models/' . $name . '.php'));

        // 2. Delete your custom architectural layers using your Paths utility
        $this->deleteFile(app_path(str_replace($root, '', Paths::ENTITY) . '/' . $name . '.php'));
        $this->deleteFile(app_path(str_replace($root, '', Paths::MAPPER) . '/' . $name . '.php'));
        $this->deleteFile(app_path(str_replace($root, '', Paths::DTO) . '/' . $name . '.php'));
        $this->deleteFile(app_path(str_replace($root, '', Paths::REPO) . '/' . $name . 'Repository.php'));
        $this->deleteFile(app_path(str_replace($root, '', Paths::REPO_IMPL) . '/' . $name . 'RepositoryImpl.php'));
        $this->deleteFile(app_path(str_replace($root, '', Paths::SERVICE) . '/' . $name . 'Service.php'));

        // 3. Delete Directories (Requests and Resources)
        $this->deleteDirectory(app_path(str_replace($root, '', Paths::REQUEST) . '/' . $name));
        $this->deleteFile(app_path(str_replace($root, '', Paths::RESOURCE) . '/' . $name . 'Resource.php'));
        $this->deleteFile(app_path('Http/Controllers/' . $name . 'Controller.php'));

        $this->info("The $name empire has fallen.");
    }

    protected function deleteFile($path)
    {
        if (File::exists($path)) {
            File::delete($path);
            $this->line("<fg=red>Deleted:</> " . basename($path));
        }
    }

    protected function deleteDirectory($path)
    {
        if (File::isDirectory($path)) {
            File::deleteDirectory($path);
            $this->line("<fg=red>Deleted Directory:</> " . basename($path));
        }
    }
}