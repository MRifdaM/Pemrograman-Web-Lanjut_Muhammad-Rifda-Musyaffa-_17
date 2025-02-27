
@extends('blog.layouts.navbar')

@section('title', 'Category Page POS')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Food Beverage</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- List Item 1: Beverages --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Beverages</h2>
                <p class="text-gray-600">Quench your thirst with our wide selection of refreshing beverages, from soft drinks to artisanal juices.</p>
            </div>
            {{-- List Item 2: Snacks --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Snacks</h2>
                <p class="text-gray-600">Enjoy a variety of delicious snacks perfect for any time of day, whether you're on the go or relaxing at home.</p>
            </div>
            {{-- List Item 3: Meals & Dishes --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Meals & Dishes</h2>
                <p class="text-gray-600">Savor our curated collection of meals and dishes crafted to delight your palate with every bite.</p>
            </div>
        </div>
    </div>
@endsection
