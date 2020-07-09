<?php

namespace Avart\Forms;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class CreateForm extends Command
{

    protected $model;
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
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model_name = $this->argument('model');
        $this->model = Table::where('model', '=', $model_name)->first();
        if (empty($this->model)) {

            $this->info('The model not found in DB');

        } else {

            Artisan::call("make:model {$this->model->model}");
            $path = app_path("{$this->model->model}.php");
            $this->info('Model created ' . $path);

            $this->updateModel($path);
            $this->info('Model updated ' . $path);
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
}
