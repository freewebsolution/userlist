<?php

namespace App\Http\Controllers;

use App\Models\ArticoliRami;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public $rami;
    public function __construct(){
       $this->rami = new ArticoliRami() ;
    }
    public function index()
    {
        $categories = Categorie::with('childs')
            ->where('nodi_ID_padre', '=', 0)
            ->where('nodi_ID', '!=', 0)
            ->get();
        $rami = ArticoliRami::distinct()->get('nodi_ID');
        foreach ($rami as $ramo){
            $id = $ramo->nodi_ID;
        }
        $rami = new ArticoliRami();
        $this->rami->counter($id);
        return view('categories.categorie', compact('categories','rami',['rami'=>$this->rami->counter($id)]));
    }
}
