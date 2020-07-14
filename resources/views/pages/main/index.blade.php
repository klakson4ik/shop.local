@extends('layouts.base')

@section('slayder')
@show

@section('left-column')

    @forelse($products as $product)
        @php
            dump($product)
        @endphp

{{--        @include('pages.general.EachProduct')--}}
    @empty
        <h2>Ничего нет</h2>
    @endforelse


@show

@section('right-column')
@show

