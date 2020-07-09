<?php

namespace Avart\Forms;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['name', 'description', 'route', 'model'];

    public function fields()
    {
        return $this->hasMany('Avart\Forms\Field');
    }
}
