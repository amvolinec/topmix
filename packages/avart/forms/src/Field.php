<?php

namespace Avart\Forms;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['table_id', 'type_id', 'name', 'title', 'fillable', 'nullable', 'inlist', 'default', 'settings'];

    public function table()
    {
        return $this->belongsTo('Avart\Forms\Table');
    }

    public function type(){
        return $this->belongsTo('Avart\Forms\Type');
    }
}
