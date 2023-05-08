<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscripcion;

class Practica extends Model
{
    public $table = 'practices';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;
    
    use HasFactory;

    public function inscription() {
        return $this->belongsTo('App\Models\Inscripcion', 'idinscripcion', 'id');
    }
}
