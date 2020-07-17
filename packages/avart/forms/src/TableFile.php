<?php

namespace Avart\Forms;

use Illuminate\Database\Eloquent\Model;

class TableFile extends Model
{
    protected $fillable = ['table_id', 'name', 'uri'];

    public function table(){
        return $this->belongsTo('Avart\Forms\Table');
    }
}
