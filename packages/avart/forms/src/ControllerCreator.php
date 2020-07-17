<?php


namespace Avart\Forms;

class ControllerCreator
{
    protected $model;
    protected $router;
    protected $table;
    protected $inner;

    public function __construct($model, $table, $router)
    {
        $this->model = $model;
        $this->table = $table;
        $this->router = $router;
    }

    public function create()
    {
        $content = file_get_contents(__DIR__ . '/parts/controller.tmp');
        $content = sprintf($content, $this->model, $this->table, $this->router);

        return $content;
    }

}
