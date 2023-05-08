<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    public $table = 'projects';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;

    use HasFactory;

    public function thesis() {
        return $this->hasOne('App\Models\Tesis', 'id', 'idtesis');
    }
}
