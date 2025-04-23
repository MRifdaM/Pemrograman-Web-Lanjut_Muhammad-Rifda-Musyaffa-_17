
@extends('blog.layouts.navbar')

@section('title', 'Category Page POS')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Baby Kid</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- List Item 1: Baby Clothing --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Baby Clothing</h2>
                <p class="text-gray-600">Browse our collection of comfortable and stylish baby clothing for your little ones.</p>
            </div>
            {{-- List Item 2: Toys & Games --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Toys & Games</h2>
                <p class="text-gray-600">Discover fun and educational toys that keep your baby engaged and entertained.</p>
            </div>
            {{-- List Item 3: Baby Care Essentials --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Baby Care Essentials</h2>
                <p class="text-gray-600">Find all the necessary items to keep your baby clean, healthy, and happy.</p>
            </div>
        </div>
    </div>
@endsection
