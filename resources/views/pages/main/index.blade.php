@extends('layouts.base')

@section('content')
    @section('slayder')
    @show

    @section('left-column')
        <div class="wrapper">
            @foreach($products as $product)
                    @include('pages.main.oneProduct')
            @endforeach
        </div>
    @show
	
	@section('left-column')
		<div class="wrapper">
			@include('vendor.pagination.default')	
		</div>
	@show

    @section('right-column')
	 @show

@endsection

<style>
    .wrapper{
        padding: 2rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        grid-gap: 2rem;
        justify-content: center;

    }

    @media only screen and (min-width : 1280px){
        .wrapper{
            grid-template-columns: repeat(auto-fit, minmax(25vw, 1fr));
        }
    }

</style>
