@extends('master')
@section('title','Categorie corrotte')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="float-left">Categorie corrotte</h5>
                <div class="clearfix"></div>
                <ul class="list-group">
                    @foreach($articoli as $nodo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @foreach($nodo->getAllNodiFromArticolo($nodo->articoli_ID) as $nodId)
                                @if($nodo->checkNodiFromArticoloRami($nodo->articoli_ID,$nodId->nodi_ID) != 1)
                                    {{$nodId->nodi_ID}}
                                @endif
                            @endforeach
                            <button class="btn btn-dark">Repair</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
