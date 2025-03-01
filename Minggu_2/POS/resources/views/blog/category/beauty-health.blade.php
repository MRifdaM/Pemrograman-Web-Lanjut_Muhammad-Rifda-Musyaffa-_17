
@extends('blog.layouts.navbar')

@section('title', 'Category Page POS')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Beauty Health</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- List Item 1: Skincare Products  --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Skincare Products</h2>
                <p class="text-gray-600">Discover a variety of skincare products to nourish and protect your skin.</p>
            </div>
            {{-- List Item 2: Makeup Essentials --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Makeup Essentials</h2>
                <p class="text-gray-600">Enhance your natural beauty with our curated selection of makeup products.</p>
            </div>
            {{--  List Item 3: Hair & Body Care  --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Hair & Body Care</h2>
                <p class="text-gray-600">Explore our range of hair and body care items for a complete beauty routine.</p>
            </div>
        </div>
    </div>
@endsection
