<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticoliRami extends Model
{
    use HasFactory;
    protected $table = 'articoli_rami';
    protected $guarded = ['articoli_rami_ID'];

    public function counter(int $nodi_id): int {
        return ArticoliRami::where("nodi_id",'=',$nodi_id)
            ->distinct()
            ->count('articoli_id');
    }
}
