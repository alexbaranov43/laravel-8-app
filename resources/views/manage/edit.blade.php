@extends('layouts.app')

@section('content')
<manage-users-edit-component :user="{{$user}}"></manage-users-edit-component>
@endsection