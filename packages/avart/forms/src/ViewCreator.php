<?php


namespace Avart\Forms;

class ViewCreator
{
    protected $model;
    protected $table;
    protected $route;
    protected $fields;
    protected $inner = '';

    public function __construct($model, $route, $fields)
    {
        $this->model = $model;
        $this->route = $route;
        $this->fields = $fields;
    }

    public function create()
    {
        $content = file_get_contents(__DIR__ . '/parts/create.tmp');
        $content = sprintf($content, $this->model, $this->route, $this->getInner());
        return $content;
    }

    protected function getInner(){
        foreach($this->fields as $field){
            $content = file_get_contents(__DIR__ . "/parts/form-group-{$field->type->class}.blade.php");
            $this->inner .= sprintf($content, $field->name, $field->title, $this->getAdditional($field), $this->route);
        }
        return $this->inner;
    }

    public function getAdditional($field){
        if($field->type->class === 'checkbox' && $field->default === '1'){
            return ' checked';
        }
        return '';
    }
}
