<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku John Doe</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': {
                            '50': '#eff6ff',
                            '100': '#dbeafe',
                            '200': '#bfdbfe',
                            '300': '#93c5fd',
                            '400': '#60a5fa',
                            '500': '#3b82f6',
                            '600': '#2563eb',
                            '700': '#1d4ed8',
                            '800': '#1e40af',
                            '900': '#1e3a8a',
                            '950': '#172554',
                        },
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #f0f4f8;
        }
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #2563eb;
            transition: width 0.3s ease;
        }
        .nav-link.active, .nav-link:hover {
            color: #1d4ed8;
        }
        .nav-link.active::after, .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        <header class="bg-white shadow-sm sticky top-0 z-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-600" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 005.5 16c1.255 0 2.443-.29 3.5-.804V4.804zM14.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 0014.5 16c1.255 0 2.443-.29 3.5-.804v-10A7.968 7.968 0 0014.5 4z" />
                        </svg>
                        <h1 class="text-2xl font-bold text-gray-800">Toko Buku Doe</h1>
                    </div>

                    <nav class="hidden md:flex space-x-8">
                        <a href="{{ route('books.index') }}" class="nav-link text-gray-600 font-medium {{ request()->routeIs('books.index') ? 'active' : '' }}">Daftar Buku</a>
                        <a href="{{ route('authors.top') }}" class="nav-link text-gray-600 font-medium {{ request()->routeIs('authors.top') ? 'active' : '' }}">Top Penulis</a>
                        <a href="{{ route('ratings.create') }}" class="nav-link text-gray-600 font-medium {{ request()->routeIs('ratings.create') ? 'active' : '' }}">Beri Rating</a>
                    </nav>
                </div>
            </div>
        </header>

        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-r-lg" role="alert">
                    <p class="font-bold">Sukses!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 mb-6 rounded-r-lg" role="alert">
                    <p class="font-bold">Oops! Ada kesalahan.</p>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <footer class="bg-white mt-12 py-6 border-t border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} Toko Buku John Doe. Dibuat oleh Haerul Taka.</p>
        </div>
    </footer>
</body>
</html>
