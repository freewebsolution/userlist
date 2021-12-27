<li>{{$child_category->nodi_descr}} ({{$rami->counter($child_category->nodi_ID)}})</li>
@if($child_category->childs)
    <ul>
        @foreach($child_category->childs as $childCategory)
            @include('child_categories',['child_category'=>$childCategory])
        @endforeach
    </ul>
@endif
