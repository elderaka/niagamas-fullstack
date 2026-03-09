<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">
    <nav class="bg-white border-b border-gray-200">
        <div class="container-xl py-3 flex items-center justify-between">
            <span class="text-sm text-gray-500">Lauda Dhia Raka - Fullstack Engineer</span>
        </div>
    </nav>

    <main class="container-xl py-6">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
