@extends('master')
@section('title','Categorie')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="float-left">Albero categorie</h5>
                <div class="clearfix"></div>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item"> {{$category->nodi_descr}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
