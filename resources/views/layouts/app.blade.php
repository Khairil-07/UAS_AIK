<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Tuntunan Tata Cara Sholat')</title>
    
    <meta name="description" content="Aplikasi Edukasi Islami Interaktif - Tuntunan Tata Cara Sholat Lengkap Sesuai Sunnah Rasulullah ﷺ berdasarkan Himpunan Putusan Tarjih Muhammadiyah." />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Nunito:wght@600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback Tailwind CSS CDN for instant rendering -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            background: '#f7faf8',
                            foreground: '#0c1f14',
                            border: 'rgba(5, 150, 105, 0.15)',
                            primary: {
                                DEFAULT: '#059669',
                                foreground: '#ffffff'
                            },
                            secondary: {
                                DEFAULT: '#ecfdf5',
                                foreground: '#064e3b'
                            },
                            muted: {
                                DEFAULT: '#f0fdf4',
                                foreground: '#6b7280'
                            }
                        },
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                            arabic: ['Amiri', 'serif'],
                            kids: ['Nunito', 'sans-serif']
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f7faf8;
            color: #0c1f14;
        }
        .font-arabic {
            font-family: 'Amiri', serif;
        }
        .font-kids {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen antialiased bg-[#f7faf8] text-[#0c1f14]">
    @yield('content')
</body>
</html>
