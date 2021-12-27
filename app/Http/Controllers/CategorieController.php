<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::with('childs')
            ->where('nodi_ID_padre', '=', 0)
            ->where('nodi_ID', '!=', 0)
            ->distinct()
            ->get('nodi_descr');
        return view('categorie', compact('categories'));
    }
}
