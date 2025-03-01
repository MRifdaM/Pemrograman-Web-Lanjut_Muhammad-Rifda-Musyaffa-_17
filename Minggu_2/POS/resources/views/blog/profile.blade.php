
@extends('blog.layouts.navbar')

@section('title', 'Profile Page POS')

@section('content')
    <h1 class="text-3xl font-bold text-center">Name: {{ $name }}</h1><br>
    <h1 class="text-3xl font-bold text-center">ID: {{ $id }}</h1>
@endsection
