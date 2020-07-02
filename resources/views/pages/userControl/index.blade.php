@extends('layouts.base')

@section('content')
    <div data-app>
        <user-control-index-component
            :users="{{json_encode($users)}}"
        >
        </user-control-index-component>
    </div>
@endsection
