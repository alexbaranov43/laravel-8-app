@extends('layouts.app')

@section('content')
    <store-image-component :user_id="{{Auth::id()}}"></store-image-component>
@endsection