```blade
<nav class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between py-3">

            <!-- Logo + Informasi -->
            <a href="{{ route('home') }}" class="flex items-center gap-4">

                <!-- Logo -->
                <div
                    class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-700 to-emerald-600 flex items-center justify-center shadow-lg flex-shrink-0">
                    <span class="text-white text-2xl">🕌</span>
                </div>

                <!-- Informasi -->
                <div>

                    <h1 class="text-xl font-bold text-green-700">
                        Belajar Sholat Muhammadiyah
                    </h1>

                    @if(isset($kelompok))

                        <div class="mt-1 flex flex-wrap items-center gap-2 text-xs">

                            <span
                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">
                                {{ $kelompok->nama_kelompok }}
                            </span>

                            <span
                                class="bg-slate-100 text-gray-700 px-3 py-1 rounded-full">
                                {{ $kelompok->prodi }}
                            </span>

                            <span
                                class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                                {{ $kelompok->mata_kuliah }}
                            </span>

                        </div>

                        <p class="mt-1 text-xs text-gray-500">
                            <span class="font-medium">
                                Dosen Pengampu :
                            </span>
                            {{ $kelompok->dosen }}
                        </p>

                    @else

                        <p class="text-sm text-gray-500">
                            Muhammadiyah
                        </p>

                    @endif

                </div>

            </a>

            <!-- Menu -->
            <div class="hidden md:flex items-center gap-2">

                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded-xl font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    Beranda
                </a>

                <a href="{{ route('gerakan.index',2) }}"
                    class="px-4 py-2 rounded-xl font-medium text-gray-700 hover:bg-sky-50 hover:text-sky-700 transition">
                    Mode Anak
                </a>

                <a href="{{ route('gerakan.index',1) }}"
                    class="px-4 py-2 rounded-xl font-medium text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                    Mode Dewasa
                </a>

            </div>

        </div>

    </div>
</nav>
```
