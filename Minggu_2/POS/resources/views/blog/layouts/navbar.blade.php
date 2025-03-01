<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title', 'Home Penjualan')</title> <!-- Judul halaman bisa diubah -->
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('home') }}" class="text-white font-bold text-xl">POS</a>
                    </div>
                    <div>
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Home
                            </a>
                            <!-- Dropdown Category -->
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium focus:outline-none">
                                    Category
                                </button>
                                <div x-show="open" x-cloak @click.away="open = false" class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                    <a href="{{ route('food-beverage') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Food & Beverage</a>
                                    <a href="{{ route('beauty-health') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Beauty & Health</a>
                                    <a href="{{ route('home-care') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Home Care</a>
                                    <a href="{{ route('baby-kid') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Baby & Kid</a>
                                </div>
                            </div>
                            <a href="{{ route('user', ['id' => 2341720028, 'name' => 'Muhammad Rifda Musyaffa']) }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                User Profile
                            </a>
                            <a href="{{ route('sale') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Sales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</body>
</html>
