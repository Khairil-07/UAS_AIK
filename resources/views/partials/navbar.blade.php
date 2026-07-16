<nav class="fixed top-0 left-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-full bg-green-700 flex items-center justify-center shadow">

                    <span class="text-white text-xl">🕌</span>

                </div>

                <div>

                    <h1 class="font-bold text-lg text-green-700">

                        Belajar Sholat

                    </h1>

                    <p class="text-xs text-gray-500">

                        Muhammadiyah

                    </p>

                </div>

            </a>

            <!-- Menu -->

            <div class="hidden md:flex items-center gap-8">

                <a href="{{ route('home') }}"
                    class="font-medium text-gray-700 hover:text-green-700 transition">

                    Beranda

                </a>

                <a href="{{ route('gerakan.index',2) }}"
                    class="font-medium text-gray-700 hover:text-sky-600 transition">

                    Mode Anak

                </a>

                <a href="{{ route('gerakan.index',1) }}"
                    class="font-medium text-gray-700 hover:text-green-700 transition">

                    Mode Dewasa

                </a>

            </div>

        </div>

    </div>

</nav>