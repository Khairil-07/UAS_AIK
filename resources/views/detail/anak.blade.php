@extends('layouts.app')

@section('title', $gerakan->nama_gerakan . ' - Mode Anak-anak')

@section('content')
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
        $kidsGradients = [
            ["#34d399","#059669"],["#2dd4bf","#0d9488"],["#38bdf8","#0284c7"],
            ["#60a5fa","#2563eb"],["#a78bfa","#7c3aed"],["#c084fc","#9333ea"],
            ["#f0abfc","#c026d3"],["#fb7185","#e11d48"],["#fb923c","#ea580c"],
            ["#fbbf24","#d97706"],["#a3e635","#65a30d"],["#4ade80","#16a34a"],
        ];
        
        $colorIdx = ($gerakan->urutan - 1) % count($accentColors);
        $color = $accentColors[$colorIdx];
        $light = $lightColors[$colorIdx];
        list($gradFrom, $gradTo) = $kidsGradients[$colorIdx % count($kidsGradients)];
        
        $totalSteps = count($allGerakans);
        $prevStep = $gerakan->urutan > 1 ? $gerakan->urutan - 1 : null;
        $nextStep = $gerakan->urutan < $totalSteps ? $gerakan->urutan + 1 : null;
        $bacaan = $gerakan->bacaans->first();
        
        // Stars calculation: display 5 stars, light up based on progress
        $starsCount = (($gerakan->urutan - 1) % 5) + 1;
    @endphp

    <div class="min-h-screen pb-12 font-kids bg-gradient-to-b" style="background: linear-gradient(160deg, {{ $light }} 0%, #fff 50%, {{ $light }} 100%);">
        
        {{-- Colorful Kids Header --}}
        <div class="text-white px-4 pt-4 pb-8 relative overflow-hidden shadow-md"
             style="background: linear-gradient(135deg, {{ $gradFrom }}, {{ $gradTo }});">
            <div class="absolute top-0 right-0 w-40 h-40 rounded-full opacity-20 -translate-y-1/2 translate-x-1/4 bg-white"></div>
            <div class="absolute bottom-0 left-8 w-24 h-24 rounded-full opacity-15 translate-y-1/2 bg-white"></div>
            
            <div class="relative max-w-lg mx-auto">
                <div class="flex items-center justify-between mb-5">
                    <a href="{{ route('dashboard', ['mode' => 'anak']) }}" class="p-2.5 bg-white/20 rounded-2xl hover:bg-white/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                    </a>
                    
                    {{-- Stars Progress Indicator --}}
                    <div class="flex gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $i <= $starsCount ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" class="w-5 h-5 {{ $i <= $starsCount ? 'text-yellow-300' : 'text-white/30' }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.15-.427.77-.427.92 0l1.562 4.435h4.686c.451 0 .637.584.272.868l-3.79 2.748 1.447 4.717c.137.447-.384.823-.743.565l-3.79-2.748-3.79 2.748c-.359.258-.88-.118-.743-.565L7.02 11.55l-3.79-2.748c-.365-.284-.179-.868.272-.868h4.686L11.48 3.5Z" />
                            </svg>
                        @endfor
                    </div>
                    
                    <a href="{{ route('dashboard', ['mode' => 'anak']) }}" class="p-2.5 bg-white/20 rounded-2xl hover:bg-white/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                </div>
                
                <div class="text-center font-kids">
                    <div class="inline-flex items-center gap-2 bg-white/25 rounded-full px-4 py-1.5 text-sm font-bold mb-3">
                        ⭐ Langkah {{ $gerakan->urutan }} dari {{ $totalSteps }}
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-black tracking-tight">
                        {{ $gerakan->nama_gerakan }}
                    </h1>
                    <p class="text-white/80 text-sm mt-1 font-semibold">{{ $gerakan->subjudul }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-lg mx-auto px-4 -mt-5">
            {{-- Kids Media Card --}}
            <div class="rounded-3xl overflow-hidden shadow-xl mb-4 border-4 bg-white" style="border-color: {{ $color }}50;">
                
                <div class="aspect-[4/3] relative overflow-hidden">
                    {{-- Photo / Illustration (Active by default) --}}
                    <div id="photo_area" class="absolute inset-0">
                        <x-geometric-pattern :color="$color" :id="'gp-kids-' . $gerakan->urutan" />
                        <div class="absolute inset-0 flex flex-col items-center justify-center gap-3">
                            <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-full flex items-center justify-center shadow-2xl"
                                 style="background: rgba(255,255,255,0.18); border: 4px dashed rgba(255,255,255,0.5); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);">
                                <span class="text-6xl sm:text-7xl leading-none drop-shadow-xl select-none">{{ $gerakan->gambar_url ?: '⭐' }}</span>
                            </div>
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl px-5 py-2">
                                <p class="text-white font-black text-base sm:text-lg drop-shadow">
                                    {{ $gerakan->nama_gerakan }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="absolute top-3 left-3 flex items-center gap-1.5 bg-white/80 backdrop-blur rounded-full px-3 py-1 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5" style="color: {{ $color }};">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                            <span class="text-xs font-black" style="color: {{ $color }};">Foto Gerakan</span>
                        </div>
                    </div>
                    
                    {{-- Video (Hidden by default) --}}
                    <div id="video_area" class="absolute inset-0 bg-gray-900 flex items-center justify-center hidden">
                        @if ($gerakan->video_url)
                            <video id="movement_video" src="{{ $gerakan->video_url }}" controls class="w-full h-full object-cover"></video>
                        @else
                            <div class="flex flex-col items-center gap-3 p-6 text-center text-white">
                                <div class="w-20 h-20 rounded-full flex items-center justify-center"
                                     style="background: linear-gradient(135deg, {{ $gradFrom }}, {{ $gradTo }});">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-9 h-9">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                </div>
                                <p class="font-black text-base">🎬 Video Belum Tersedia</p>
                                <p class="text-white/50 text-xs">URL video bisa diatur di panel Admin ⚙️</p>
                            </div>
                        @endif
                        
                        <div class="absolute top-3 left-3 flex items-center gap-1.5 bg-red-500 rounded-full px-3 py-1 shadow">
                            <div class="w-2 h-2 rounded-full bg-white animate-pulse"></div>
                            <span class="text-white text-xs font-black">VIDEO</span>
                        </div>
                    </div>
                </div>

                {{-- Oversized Toggle Button --}}
                <button
                    id="toggle_media_btn"
                    class="w-full py-4 flex items-center justify-center gap-3 font-black text-base text-white transition-all active:scale-95 cursor-pointer shadow-inner"
                    style="background: linear-gradient(135deg, {{ $gradFrom }}, {{ $gradTo }});"
                >
                    <span id="btn_text_photo" class="hidden">📸 Lihat Foto Gerakan</span>
                    <span id="btn_text_video">🎬 Tonton Video Gerakan</span>
                </button>
            </div>

            {{-- Kids Description Bubble --}}
            <div class="rounded-3xl p-5 mb-5 shadow-md border-2 bg-white"
                 style="background-color: {{ $light }}30; border-color: {{ $color }}40;">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-xl shadow-sm bg-white"
                         style="border: 2px solid {{ $color }}30;">
                        {{ $gerakan->gambar_url ?: '⭐' }}
                    </div>
                    <p class="text-sm sm:text-base leading-relaxed font-bold flex-1" style="color: {{ $color }};">
                        {{ $gerakan->deskripsi }}
                    </p>
                </div>
            </div>

            {{-- Reading Card --}}
            @if ($bacaan)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden mb-5 border-2" style="border-color: {{ $color }}35;">
                    <div class="px-5 py-3.5 text-center font-black text-white text-sm"
                         style="background: linear-gradient(135deg, {{ $gradFrom }}, {{ $gradTo }});">
                        ✨ Bacaan Doanya ✨
                    </div>
                    
                    <div class="p-5 space-y-4">
                        {{-- Arabic --}}
                        <div class="rounded-2xl p-4 sm:p-5 text-center" style="background-color: {{ $color }}10;">
                            <p class="leading-[2.2] font-arabic text-2xl" dir="rtl" lang="ar" style="color: #0c1f14;">
                                {{ $bacaan->teks_arab }}
                            </p>
                        </div>
                        
                        {{-- Transliteration --}}
                        <div class="rounded-2xl px-4 py-3 text-center text-sm font-black italic"
                             style="background-color: {{ $color }}18; color: {{ $color }};">
                            {{ $bacaan->teks_latin }}
                        </div>
                        
                        {{-- Translation --}}
                        <div class="text-center text-sm font-bold leading-relaxed text-slate-700">
                            🌟 {{ $bacaan->terjemahan }} 🌟
                        </div>
                        
                        {{-- Audio --}}
                        <div class="rounded-2xl p-4 bg-gray-50 border border-gray-100">
                            <x-audio-player :isKids="true" :color="$color" :audioUrl="$bacaan->audio_url" />
                        </div>
                    </div>
                </div>
            @endif

            {{-- Oversized Nav --}}
            <div class="flex items-stretch gap-4">
                @if ($prevStep)
                    <a href="{{ route('detail', ['urutan' => $prevStep, 'mode' => 'anak']) }}"
                       class="flex-1 py-5 rounded-2xl flex flex-col items-center justify-center gap-1.5 font-black text-sm shadow-md active:scale-95 transition-all text-center border-3 bg-white"
                       style="color: {{ $color }}; border-color: {{ $color }}50;"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        <span>Sebelumnya</span>
                    </a>
                @else
                    <button disabled
                       class="flex-1 py-5 rounded-2xl flex flex-col items-center justify-center gap-1.5 font-black text-sm text-gray-300 opacity-40 shadow-sm border-3 border-gray-200 cursor-not-allowed bg-gray-50"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        <span>Sebelumnya</span>
                    </button>
                @endif

                @if ($nextStep)
                    <a href="{{ route('detail', ['urutan' => $nextStep, 'mode' => 'anak']) }}"
                       class="flex-1 py-5 rounded-2xl flex flex-col items-center justify-center gap-1.5 font-black text-sm text-white shadow-lg active:scale-95 transition-all text-center"
                       style="background: linear-gradient(135deg, {{ $gradFrom }}, {{ $gradTo }});"
                    >
                        <span>Selanjutnya</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                @else
                    <button disabled
                       class="flex-1 py-5 rounded-2xl flex flex-col items-center justify-center gap-1.5 font-black text-sm text-gray-300 opacity-40 shadow-sm border-3 border-gray-200 cursor-not-allowed bg-gray-50"
                    >
                        <span>Selesai</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </button>
                @endif
            </div>

            {{-- Progress dots --}}
            <div class="flex items-center justify-center gap-1.5 mt-5 flex-wrap">
                @foreach ($allGerakans as $g)
                    @php
                        $isCurrent = $g->urutan == $gerakan->urutan;
                        $isPassed = $g->urutan < $gerakan->urutan;
                    @endphp
                    <a href="{{ route('detail', ['urutan' => $g->urutan, 'mode' => 'anak']) }}" 
                       class="rounded-full transition-all duration-300"
                       style="
                           width: {{ $isCurrent ? '24px' : '8px' }}; 
                           height: 8px;
                           background-color: {{ $isCurrent ? $color : ($isPassed ? $color . '80' : '#d1d5db') }}
                       "
                       title="Langkah {{ $g->urutan }}"
                    ></a>
                @endforeach
            </div>

            {{-- Success / Motivation Banner --}}
            <p class="text-center text-xs mt-4 font-black pb-4" style="color: {{ $color }};">
                @if ($gerakan->urutan == $totalSteps)
                    🎊 Kamu sudah menyelesaikan semua gerakan sholat! Luar biasa! 🎊
                @else
                    💪 Semangat! Masih {{ $totalSteps - $gerakan->urutan }} langkah lagi! Kamu pasti bisa!
                @endif
            </p>

        </div>
    </div>

    {{-- Kids interactive scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleMediaBtn = document.getElementById('toggle_media_btn');
            const photoArea = document.getElementById('photo_area');
            const videoArea = document.getElementById('video_area');
            const btnTextPhoto = document.getElementById('btn_text_photo');
            const btnTextVideo = document.getElementById('btn_text_video');
            const videoEl = document.getElementById('movement_video');

            let isVideoActive = false;

            toggleMediaBtn.addEventListener('click', () => {
                isVideoActive = !isVideoActive;
                if (isVideoActive) {
                    photoArea.classList.add('hidden');
                    videoArea.classList.remove('hidden');
                    btnTextPhoto.classList.remove('hidden');
                    btnTextVideo.classList.add('hidden');
                    if (videoEl) {
                        videoEl.play().catch(e => console.log("Video play blocked: ", e));
                    }
                } else {
                    photoArea.classList.remove('hidden');
                    videoArea.classList.add('hidden');
                    btnTextPhoto.classList.add('hidden');
                    btnTextVideo.classList.remove('hidden');
                    if (videoEl) {
                        videoEl.pause();
                    }
                }
            });
        });
    </script>
@endsection
