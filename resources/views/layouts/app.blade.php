<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | Belajar Gerakan Sholat</title>

    <meta name="description"
        content="Aplikasi Edukasi Gerakan dan Bacaan Sholat Muhammadiyah">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen flex flex-col bg-slate-50 text-gray-800">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Content --}}
    <main class="flex-1">

        @yield('content')

    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>

</html>