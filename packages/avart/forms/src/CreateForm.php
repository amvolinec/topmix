<?php

namespace Avart\Forms;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;
use Avart\Forms\TableFile;

class CreateForm extends Command
{

    protected $model;
    protected $path;
    protected $fillable = 'protected $fillable = [%s];';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'form:create {model : The model name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create form';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->path = base_path();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model_name = $this->argument('model');
        $this->model = Table::with('files')->where('model', '=', $model_name)->first();
        if (empty($this->model)) {

            $this->info('The model not found in DB');

        } else {

            if (!empty($this->model->files)) {
                $this->deleteFiles();
            }

            Artisan::call("make:model {$this->model->model}");
            $path = app_path("{$this->model->model}.php");
            $this->info('Model created ' . $path);

            $this->updateModel($path);
            $this->info('Model updated ' . $path);
            $this->addFile('Model', $path);

            $filename = $this->createView();
            $this->info('Index View created ' . $filename);
            $this->addFile('Index view', $filename);

            $filename = $this->createViewCreate();
            $this->info('Create View created ' . $filename);
            $this->addFile('Crete View', $filename);

            $filename = $this->createMigration();
            $this->info('Migration created ' . $filename);
            $this->addFile('Migration', $filename);

            $filename = $this->createController();
            $this->info('Controller created ' . $filename);
            $this->addFile('Controller', $filename);

            $this->info("Run: php artisasn migrate\nAdd to routes:");
        }

    }

    protected function updateModel($path)
    {
        $str = [];
        $fields = $this->model->fields;
        foreach ($fields as $field) {
            if ($field->fillable === 1) {
                array_push($str, '"' . $field->name . '"');
            }
        }
        $content = file_get_contents($path);
        $fillable = sprintf($this->fillable, implode(', ', $str));
        $content = str_replace('//', ($fillable . "\n\n\t//"), $content);
        file_put_contents($path, $content);
    }

    protected function createView()
    {
        $dir = $this->path . '/resources/views/' . $this->model->route;
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0755, true)) {
                die("'Can't create folder");
            }
        }

        $creator = new TableCreator($this->model->name, $this->model->route, $this->model->fields);

        $fileName = $dir . '/index.blade.php';
        file_put_contents($fileName, $creator->get());
        return $fileName;
    }

    protected function createMigration()
    {
        $fileName = $this->path . '/database/migrations/' . date('Y_m_d_His') . '_create_' . $this->model->name . '_table.php';
        $creator = new MigrationCreator($this->model->name, $this->model->fields);
        file_put_contents($fileName, $creator->create());
        return $fileName;
    }

    protected function createController()
    {
        $fileName = $this->path . '/app/Http/Controllers/' . $this->model->model . 'Controller.php';
        $creator = new ControllerCreator($this->model->model, $this->model->name, $this->model->route);
        file_put_contents($fileName, $creator->create());
        return $fileName;
    }

    protected function createViewCreate()
    {
        $fileName = $this->path . '/resources/views/' . $this->model->route . '/create.blade.php';
        $creator = new ViewCreator($this->model->model, $this->model->route, $this->model->fields);
        file_put_contents($fileName, $creator->create());
        return $fileName;
    }

    protected function addFile($name, $uri)
    {
        $file = TableFile::create([
            'table_id' => $this->model->id,
            'name' => $name,
            'uri' => $uri
        ]);
        $this->model->files->add($file);
    }

    protected function deleteFiles()
    {
        $confirm = $this->ask('Delete existing files ? (y/n)');
        if ($confirm === 'y') {
            foreach ($this->model->files as $file) {
                if (is_file($file->uri)) {
                    unlink($file->uri);
                    $this->info('file deleted ' . $file->uri);
                } else {
                    $this->info('file not found ' . $file->uri);
                }
            }
            $this->model->files()->delete();
        }
    }
}
