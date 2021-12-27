<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::distinct()->get('nodi_descr');
        return view('categorie',compact('categories'));
    }
}
