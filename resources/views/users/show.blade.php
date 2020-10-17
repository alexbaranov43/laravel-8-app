@extends('layouts.app')

@section('content')
    <user-info-component :user="{{$user}}"></user-info-component>
@endsection