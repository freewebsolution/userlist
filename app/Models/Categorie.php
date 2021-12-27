<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    public $table = 'nodi';
    protected $guarded =['nodi_ID'];

    public function childs(){
        return $this->hasMany(Categorie::class,'nodi_ID_padre','nodi_ID');
    }
}
