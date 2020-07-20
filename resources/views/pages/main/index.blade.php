@extends('layouts.base')

@section('content')
    @section('slayder')
    @show

    @section('left-column')

        @foreach($products as $product)
                @include('pages.main.oneProduct')
        @endforeach


    @show

    @section('right-column')
    @show
@endsection

