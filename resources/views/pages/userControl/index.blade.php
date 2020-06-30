@extends('layouts.base')

@section('content')
    <div data-app>
        <currency-index-component
            :users="{{json_encode($users)}}"
        >
        </currency-index-component>
    </div>
@endsection
