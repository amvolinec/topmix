<?php


namespace Avart\Forms;


use SebastianBergmann\CodeCoverage\Report\PHP;

class TableCreator
{
    protected $route;
    protected $fields;
    protected $table;
    protected $tHeadLine = '<th scope="col">{{ __("%s") }}</th>' . "\n";
    protected $tBodyLine = '<td>{{ $%1$s->%2$s }}</td>' . PHP_EOL;
    protected $html;

    public function __construct($table, $route, $fields)
    {
        $this->route = $route;
        $this->fields = $fields;
        $this->table = $table;
    }

    public function getHeader()
    {
        $inner = '';
        foreach ($this->fields as $field) {
            if ($field->inlist) {
                $inner .= (!empty($inner) ? str_repeat("\t", 8) : '') . sprintf($this->tHeadLine, $field->title);
            }
        }
        return $inner;
    }

    public function getBody()
    {
        $inner = '';
        foreach ($this->fields as $field) {
            if ($field->inlist) {
                $inner .= (!empty($inner) ? str_repeat("\t", 9) : '') . sprintf($this->tBodyLine, $this->route, $field->name);
            }
        }
        return $inner;
    }

    public function get()
    {
        $content = file_get_contents(__DIR__ . '/parts/index.tmp');
        $content = sprintf($content, $this->route, 'Name', $this->getHeader(), $this->getBody(), $this->table);
        return $content;
    }
}
