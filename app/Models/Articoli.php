<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Articoli extends Model
{
    protected $table = 'articoli';
    protected $guarded = 'articoli_ID';

    public function getAllNodiFromArticolo(int $articolo_id):Collection{
        return ArticoliNodi::distinct()->where('articoli_ID','=',$articolo_id)->get('nodi_ID');
    }

    public function checkNodiFromArticoloRami(int $art_id,int $nodi_id):bool{
        return ArticoliRami::distinct()
            ->where('articoli_ID','=',$art_id)
            ->where('nodi_ID','=',$nodi_id)
            ->exists('nodi_ID');
    }
    use HasFactory;
}
