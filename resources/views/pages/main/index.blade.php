@extends('layouts.base')

@section('content')
    @section('slayder')
    @show

    @section('left-column')

        @forelse($products as $product)
            @include('pages.main.oneProduct')
        @empty
            <h2>Ничего нет</h2>
        @endforelse


    @show

    @section('right-column')
    @show
@endsection

