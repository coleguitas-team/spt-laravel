<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Practica;

class Inscripcion extends Model
{
    public $table = 'inscriptions';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;

    use HasFactory;

    public function practice() {
        return $this->hasOne('App\Models\Practica', 'id', 'idinscripcion');
    }
}
