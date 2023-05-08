<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    public $table = 'posts';
    protected $primaryKey = 'id';
    protected $guarded=[];
    public $timestamps = false;
    
    use HasFactory;
}
