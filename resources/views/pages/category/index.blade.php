@extends('layouts.base')

@section('content')
    <div data-app>
        <category-index-component
            :categories="{{json_encode($categories)}}"
        >
        </category-index-component>
    </div>
@endsection
