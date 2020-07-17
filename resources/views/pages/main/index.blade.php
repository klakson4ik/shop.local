@extends('layouts.base')

@section('content')
    @section('slayder')
    @show

    @section('left-column')

        @foreach($products as $cat)
{{--                  <?php foreach ($cat as $product) :?>--}}
{{--                  <?php dump($product) ; ?>--}}
{{--                @include('pages.main.oneProduct')--}}
{{--                  <?php endforeach;?>--}}
        @endforeach


    @show

    @section('right-column')
    @show
@endsection

