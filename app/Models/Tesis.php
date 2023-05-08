<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    public $table = 'thesis';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;
    
    use HasFactory;

    public function project() {
        return $this->belongsTo('App\Models\Proyecto', 'idproyecto', 'id');
    }
}
