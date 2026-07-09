@extends('layouts.app')

@section('title', 'Dashboard - Tuntunan Tata Cara Sholat')

@section('content')
    <x-meta-header :meta="$meta" :showAdminLink="true" />

    {{-- Hero Section --}}
    <div class="bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-800 text-white px-4 py-10 sm:py-14 text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 rounded-full opacity-10 -translate-y-1/2 translate-x-1/4"
             style="background: radial-gradient(circle,#a7f3d0,transparent)"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 rounded-full opacity-10 translate-y-1/2 -translate-x-1/4"
             style="background: radial-gradient(circle,#6ee7b7,transparent)"></div>
        <div class="relative max-w-2xl mx-auto">
            <p class="text-3xl sm:text-4xl mb-3 leading-relaxed opacity-90 font-arabic" dir="rtl" lang="ar">
                بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
            </p>
            <div class="w-24 h-px bg-emerald-400 mx-auto my-4 opacity-50"></div>
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold leading-snug mb-2">
                Tuntunan Tata Cara Sholat
            </h1>
            <p class="text-emerald-200 text-base sm:text-lg font-semibold">Sesuai Sunnah Rasulullah ﷺ</p>
            <p class="text-emerald-300/70 text-xs sm:text-sm mt-2">
                Berdasarkan Himpunan Putusan Tarjih (HPT) Muhammadiyah
            </p>
            <div class="flex items-center justify-center gap-6 mt-6">
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-emerald-300">12</div>
                        <div class="text-xs text-emerald-400">Gerakan</div>
                    </div>
                </div>
                <div class="w-px h-8 bg-emerald-600"></div>
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-emerald-300">2</div>
                        <div class="text-xs text-emerald-400">Mode Belajar</div>
                    </div>
                </div>
                <div class="w-px h-8 bg-emerald-600"></div>
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-emerald-300">5</div>
                        <div class="text-xs text-emerald-400">Waktu Sholat</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mode Toggle Selector --}}
    <div class="px-4 py-6 max-w-xl mx-auto">
        <p class="text-center text-xs font-semibold text-gray-500 uppercase tracking-widest mb-4">
            Pilih Mode Pembelajaran
        </p>
        
        <div class="relative bg-gray-100 rounded-2xl p-1 flex shadow-inner">
            <div id="mode_slider" class="absolute top-1 bottom-1 rounded-xl transition-all duration-300 shadow-md w-[calc(50%-4px)] bg-gradient-to-r from-emerald-700 to-emerald-600 left-[4px]"></div>
            
            <button id="toggle_dewasa" class="relative flex-1 py-3 px-4 rounded-xl flex items-center justify-center gap-2 font-semibold text-sm z-10 transition-colors text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.109A11.386 11.386 0 0 1 10.089 18H8.25c-.621 0-1.125-.504-1.125-1.125V18M11.089 18.003c.5-.91.786-1.957.786-3.07v-.003c0-1.113-.285-2.16-.786-3.07M11.089 18H8.25A11.386 11.386 0 0 1 3.325 19.18l-.015-.109V19.07a4.125 4.125 0 0 1 7.533-2.493M11.089 18v-.003c0-1.113-.285-2.16-.786-3.07M12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm7.25 1.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5ZM4.75 13.5a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                </svg>
                Mode Dewasa
            </button>
            
            <button id="toggle_anak" class="relative flex-1 py-3 px-4 rounded-xl flex items-center justify-center gap-2 font-semibold text-sm z-10 transition-colors text-gray-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 21L13.688 18.062L18.375 21L17.563 15.904L21.375 12.188L16.219 11.438L14 6.75L11.781 11.438L6.625 12.188L10.438 15.904M12 2v2M22 12h-2M4 12H2M12 22v-2" />
                </svg>
                Mode Anak-anak
            </button>
        </div>
        
        <p id="mode_description" class="text-center text-xs text-gray-500 mt-3 leading-relaxed">
            Tampilan formal dengan teks Arab lengkap, transliterasi, terjemahan, dan penjelasan ilmiah.
        </p>
    </div>

    {{-- Movement Cards - Dewasa Mode --}}
    <div id="grid_dewasa" class="px-4 pb-10 max-w-4xl mx-auto">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-1 h-5 bg-primary rounded-full"></div>
            <h2 class="text-sm font-bold text-foreground uppercase tracking-wider">
                Urutan Gerakan Sholat
            </h2>
            <span class="ml-auto text-xs text-gray-500 bg-emerald-50 border border-emerald-100 rounded-full px-2.5 py-1 font-medium">
                12 Langkah
            </span>
        </div>
        
        @php
            $accentColors = [
                "#059669","#0d9488","#0891b2","#2563eb",
                "#7c3aed","#9333ea","#c026d3","#e11d48",
                "#ea580c","#d97706","#65a30d","#16a34a",
            ];
            $lightColors = [
                "#ecfdf5","#f0fdfa","#ecfeff","#eff6ff",
                "#f5f3ff","#faf5ff","#fdf4ff","#fff1f2",
                "#fff7ed","#fffbeb","#f7fee7","#f0fdf4",
            ];
        @endphp

        <div class="grid gap-3 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($gerakansDewasa as $idx => $g)
                @php
                    $color = $accentColors[$idx % count($accentColors)];
                @endphp
                <a href="{{ route('detail', ['urutan' => $g->urutan, 'mode' => 'dewasa']) }}"
                   class="flex items-center gap-3 p-3.5 bg-white rounded-xl border border-gray-100 text-left transition-all hover:shadow-md active:scale-[0.98] shadow-sm group"
                   style="border-left-width: 3px; border-left-color: {{ $color }}">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center text-white text-sm font-bold flex-shrink-0 shadow-sm"
                         style="background-color: {{ $color }}">
                        {{ $g->urutan }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-semibold text-foreground leading-tight truncate">{{ $g->nama_gerakan }}</p>
                        <p class="text-xs text-gray-400 truncate mt-0.5">{{ $g->subjudul }}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            @endforeach
        </div>
    </div>

    {{-- Movement Cards - Kids Mode (hidden by default) --}}
    <div id="grid_anak" class="px-4 pb-10 max-w-4xl mx-auto hidden">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-1 h-5 bg-purple-600 rounded-full"></div>
            <h2 class="text-sm font-bold text-purple-700 uppercase tracking-wider font-kids">
                Urutan Gerakan Sholat Ceria
            </h2>
            <span class="ml-auto text-xs text-purple-600 bg-purple-50 border border-purple-100 rounded-full px-2.5 py-1 font-bold font-kids">
                12 Langkah ⭐
            </span>
        </div>

        <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($gerakansAnak as $idx => $g)
                @php
                    $color = $accentColors[$idx % count($accentColors)];
                    $light = $lightColors[$idx % count($lightColors)];
                @endphp
                <a href="{{ route('detail', ['urutan' => $g->urutan, 'mode' => 'anak']) }}"
                   class="flex flex-col items-center gap-2 p-4 rounded-2xl border-2 text-center transition-all hover:scale-[1.03] active:scale-[0.97] shadow-sm hover:shadow-lg"
                   style="background-color: {{ $light }}; border-color: {{ $color }}55;">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm font-kids"
                         style="background-color: {{ $color }};">
                        {{ $g->urutan }}
                    </div>
                    <span class="text-3xl leading-none mt-1">{{ $g->gambar_url ?: '⭐' }}</span>
                    <span class="text-xs font-bold leading-tight font-kids mt-1" style="color: {{ $color }}">
                        {{ $g->nama_gerakan }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="text-center pb-8 px-4">
        <p class="text-xs text-gray-400">
            Sumber: Himpunan Putusan Tarjih (HPT) Muhammadiyah
        </p>
    </div>

    {{-- LocalStorage and toggle scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleDewasaBtn = document.getElementById('toggle_dewasa');
            const toggleAnakBtn = document.getElementById('toggle_anak');
            const modeSlider = document.getElementById('mode_slider');
            const modeDesc = document.getElementById('mode_description');
            
            const gridDewasa = document.getElementById('grid_dewasa');
            const gridAnak = document.getElementById('grid_anak');

            let currentMode = localStorage.getItem('salah_app_mode') || "{{ $defaultMode }}";

            function setMode(mode) {
                currentMode = mode;
                localStorage.setItem('salah_app_mode', mode);

                if (mode === 'dewasa') {
                    // Update Toggle style
                    modeSlider.style.left = '4px';
                    modeSlider.style.background = 'linear-gradient(135deg, #047857, #059669)';
                    toggleDewasaBtn.classList.remove('text-gray-500');
                    toggleDewasaBtn.classList.add('text-white');
                    toggleAnakBtn.classList.remove('text-white');
                    toggleAnakBtn.classList.add('text-gray-500');

                    // Show Dewasa, Hide Anak
                    gridDewasa.classList.remove('hidden');
                    gridAnak.classList.add('hidden');
                    
                    // Description
                    modeDesc.textContent = "Tampilan formal dengan teks Arab lengkap, transliterasi, terjemahan, dan penjelasan ilmiah.";
                } else {
                    // Update Toggle style
                    modeSlider.style.left = 'calc(50%)';
                    modeSlider.style.background = 'linear-gradient(135deg, #7c3aed, #db2777)';
                    toggleDewasaBtn.classList.remove('text-white');
                    toggleDewasaBtn.classList.add('text-gray-500');
                    toggleAnakBtn.classList.remove('text-gray-500');
                    toggleAnakBtn.classList.add('text-white');

                    // Show Anak, Hide Dewasa
                    gridDewasa.classList.add('hidden');
                    gridAnak.classList.remove('hidden');

                    // Description
                    modeDesc.textContent = "Tampilan ceria dengan ilustrasi besar dan bahasa yang mudah dipahami anak-anak.";
                }
                
                // Update links on page to carry active mode parameter so query parameters match if bookmarking
                document.querySelectorAll('a').forEach(link => {
                    const url = new URL(link.href);
                    if (url.pathname.includes('/gerakan/')) {
                        url.searchParams.set('mode', mode);
                        link.href = url.pathname + url.search;
                    }
                });
            }

            toggleDewasaBtn.addEventListener('click', () => setMode('dewasa'));
            toggleAnakBtn.addEventListener('click', () => setMode('anak'));

            // Initialize mode
            setMode(currentMode);
        });
    </script>
@endsection
