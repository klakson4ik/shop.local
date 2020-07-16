@extends('layouts.base')

@section('content')
    @section('slayder')
    @show

    @section('left-column')

        @forelse($products as $cat)
            @foreach($cat as $product)
                @php
                    dump($product)
                @endphp
{{--                @include('pages.main.oneProduct')--}}
            @endforeach
        @empty
            <h2>Ничего нет</h2>
        @endforelse


    @show

    @section('right-column')
    @show
@endsection

