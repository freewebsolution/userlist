<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $table = 'nodi';
    protected $guarded =['nodi_ID'];
    use HasFactory;
}
