
@extends('blog.layouts.navbar')

@section('title', 'Category Page POS')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Home Care</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{--  List Item 1: Cleaning Supllies --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Cleaning Supplies</h2>
            <p class="text-gray-600">Find all the cleaning supplies you need to keep your home sparkling clean.</p>
        </div>
        {{--  List Item 1: Kitchen Essentials --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Kitchen Essentials</h2>
            <p class="text-gray-600">Equip your kitchen with essential tools and accessories for a perfect cooking experience.</p>
        </div>
        {{--  List Item 1: Home Decor & Organization --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Home Decor & Organization</h2>
            <p class="text-gray-600">Transform your space with stylish home decor and smart organization solutions.</p>
        </div>
    </div>
</div>
@endsection
