<?php


namespace Avart\Forms;

class MigrationCreator
{
    protected $fields;
    protected $table;
    protected $inner;
    protected $line = '$table->%2$s(\'%1$s\')';
    protected $strings = ['string', 'text', 'char', 'longText', 'date', 'dateTime', 'time', 'json', 'jsonb'];

    public function __construct($table, $fields)
    {
        $this->fields = $fields;
        $this->table = $table;
    }


    public function create()
    {
        $content = file_get_contents(__DIR__ . '/parts/migration.tmp');

        $inner = $this->getInner();

        $content = sprintf($content, $this->table, $inner, ucfirst($this->table));

        return $content;
    }

    protected function getInner()
    {
        foreach ($this->fields as $field) {
            if ($field->inlist) {
                $this->inner .= (!empty($this->inner) ? str_repeat("\t", 3) : '') . $this->castField($field);
            }
        }
        return $this->inner;
    }

    protected function castField($field)
    {
        return sprintf($this->line, $field->name, $field->type->name)
            . ($field->nullable === 1 ? '->nullable()' : '') . $this->getDefault($field) . ';' . PHP_EOL;
    }

    protected function getDefault($field)
    {
        if($field->default === null){
            return '';
        }
        if (in_array($field->type->name, $this->strings)) {
            $default = sprintf('->default("%s")', $field->default);
        } else {
            $default = sprintf('->default(%s)', $field->default);
        }
        return $default;
    }

}
