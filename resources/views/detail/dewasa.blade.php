@extends('layouts.app')

@section('title', $gerakan->nama_gerakan . ' - Mode Dewasa')

@section('content')
    <x-meta-header :meta="$meta" />

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
        $colorIdx = ($gerakan->urutan - 1) % count($accentColors);
        $color = $accentColors[$colorIdx];
        $light = $lightColors[$colorIdx];
        
        $totalSteps = count($allGerakans);
        $prevStep = $gerakan->urutan > 1 ? $gerakan->urutan - 1 : null;
        $nextStep = $gerakan->urutan < $totalSteps ? $gerakan->urutan + 1 : null;
        $bacaan = $gerakan->bacaans->first();
    @endphp

    {{-- Sticky Nav --}}
    <div class="sticky top-0 z-20 bg-white/95 backdrop-blur border-b border-gray-150 shadow-sm">
        <div class="max-w-2xl mx-auto px-4 py-3 flex items-center gap-3">
            <a href="{{ route('dashboard', ['mode' => 'dewasa']) }}" class="p-2 rounded-xl hover:bg-gray-100 transition-colors flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
            </a>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-0.5">
                    <span class="text-xs font-bold px-2.5 py-0.5 rounded-full text-white flex-shrink-0"
                          style="background-color: {{ $color }}">
                        {{ $gerakan->urutan }} / {{ $totalSteps }}
                    </span>
                    <h1 class="text-sm font-bold text-foreground truncate">{{ $gerakan->nama_gerakan }}</h1>
                </div>
                <p class="text-xs text-gray-400 truncate">{{ $gerakan->subjudul }}</p>
            </div>
            
            {{-- Toggle Photo/Video button --}}
            <button id="toggle_media_btn" class="p-2 rounded-xl transition-colors flex-shrink-0 hover:bg-gray-100 text-gray-400 cursor-pointer" title="Toggle Foto / Video">
                <svg id="icon_video" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
                <svg id="icon_photo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>
            </button>
        </div>
    </div>

    <div class="max-w-2xl mx-auto px-4 py-5 space-y-5 pb-24">
        {{-- Media Area --}}
        <div id="media_container" class="aspect-video rounded-2xl overflow-hidden relative shadow-md">
            {{-- Photo / Illustration (Active by default) --}}
            <div id="photo_area" class="absolute inset-0">
                <x-geometric-pattern :color="$color" :id="'gp-' . $gerakan->urutan" />
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <div class="text-6xl sm:text-7xl mb-3 drop-shadow-lg">{{ $gerakan->gambar_url ?: '🕌' }}</div>
                    <p class="text-white text-lg sm:text-xl font-bold drop-shadow">{{ $gerakan->nama_gerakan }}</p>
                    <p class="text-white/70 text-sm mt-1">{{ $gerakan->subjudul }}</p>
                    <p class="absolute bottom-3 right-3 text-white/50 text-xs font-mono">
                        {{ $gerakan->urutan }} / {{ $totalSteps }}
                    </p>
                </div>
            </div>
            
            {{-- Video (Hidden by default) --}}
            <div id="video_area" class="absolute inset-0 bg-gray-900 flex items-center justify-center hidden">
                @if ($gerakan->video_url)
                    <video id="movement_video" src="{{ $gerakan->video_url }}" controls class="w-full h-full object-cover"></video>
                @else
                    <div class="text-center text-white/60 p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto mb-2 text-white/40">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        <p class="text-sm font-semibold">Video Gerakan: {{ $gerakan->nama_gerakan }}</p>
                        <p class="text-xs mt-1 opacity-60">URL video belum dikonfigurasi - atur di panel Admin.</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Description --}}
        <div class="rounded-xl p-4 border-l-4 text-sm leading-relaxed"
             style="background-color: {{ $light }}; border-left-color: {{ $color }};">
            <p class="text-slate-800 font-medium">{{ $gerakan->deskripsi }}</p>
        </div>

        {{-- Reading Card --}}
        @if ($bacaan)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-5 py-3.5 flex items-center gap-2 border-b border-gray-100" style="background-color: {{ $color }}12;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-emerald-800" style="color: {{ $color }}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="text-sm font-bold" style="color: {{ $color }}">Bacaan Sholat</h2>
                </div>
                <div class="p-5 space-y-5">
                    {{-- Arabic --}}
                    <div class="rounded-xl p-5 text-right" style="background-color: {{ $color }}08;">
                        <p class="leading-[2.4] text-slate-900 font-arabic text-2xl" dir="rtl" lang="ar">
                            {{ $bacaan->teks_arab }}
                        </p>
                    </div>
                    
                    <div class="h-px bg-gray-100"></div>
                    
                    {{-- Transliteration --}}
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Transliterasi</p>
                        <p class="text-sm italic text-slate-800 leading-relaxed font-medium">{{ $bacaan->teks_latin }}</p>
                    </div>
                    
                    <div class="h-px bg-gray-100"></div>
                    
                    {{-- Translation --}}
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Terjemahan</p>
                        <p class="text-sm text-slate-700 leading-relaxed font-medium">{{ $bacaan->terjemahan }}</p>
                    </div>
                    
                    <div class="h-px bg-gray-100"></div>
                    
                    {{-- Audio Player --}}
                    <x-audio-player :isKids="false" :color="$color" :audioUrl="$bacaan->audio_url" />
                </div>
            </div>
        @endif

        {{-- Progress Dots --}}
        <div class="flex items-center justify-center gap-1.5 flex-wrap py-1">
            @foreach ($allGerakans as $g)
                @php
                    $isCurrent = $g->urutan == $gerakan->urutan;
                    $isPassed = $g->urutan < $gerakan->urutan;
                @endphp
                <a href="{{ route('detail', ['urutan' => $g->urutan, 'mode' => 'dewasa']) }}" 
                   class="rounded-full transition-all duration-200"
                   style="
                       width: {{ $isCurrent ? '22px' : '8px' }}; 
                       height: 8px;
                       background-color: {{ $isCurrent ? $color : ($isPassed ? $color . '70' : '#e5e7eb') }}
                   "
                   title="Langkah {{ $g->urutan }}"
                ></a>
            @endforeach
        </div>

        <p class="text-center text-xs text-gray-400">
            Sumber: Himpunan Putusan Tarjih (HPT) Muhammadiyah
        </p>
    </div>

    {{-- Bottom Bar --}}
    <div class="fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur border-t border-gray-100 shadow-lg z-20">
        <div class="max-w-2xl mx-auto px-4 py-3 flex items-center justify-between gap-3">
            @if ($prevStep)
                <a href="{{ route('detail', ['urutan' => $prevStep, 'mode' => 'dewasa']) }}"
                   class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-gray-200 font-semibold text-sm hover:bg-gray-50 active:scale-95 transition-all text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <span class="hidden sm:inline">Sebelumnya</span>
                </a>
            @else
                <button disabled class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-gray-100 font-semibold text-sm text-gray-300 opacity-50 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <span class="hidden sm:inline">Sebelumnya</span>
                </button>
            @endif

            <button id="autoplay_btn" class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold transition-all bg-gray-100 text-gray-600 hover:bg-gray-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5" id="autoplay_icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
                <span>Autoplay</span>
            </button>

            @if ($nextStep)
                <a href="{{ route('detail', ['urutan' => $nextStep, 'mode' => 'dewasa']) }}"
                   class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-semibold text-sm text-white shadow-sm active:scale-95 transition-all"
                   style="background-color: {{ $color }}">
                    <span class="hidden sm:inline">Selanjutnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            @else
                <button disabled class="flex items-center gap-1.5 px-4 py-2.5 rounded-xl font-semibold text-sm text-gray-300 bg-gray-100 opacity-50 cursor-not-allowed">
                    <span class="hidden sm:inline">Selanjutnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            @endif
        </div>
    </div>

    {{-- Page-level interactive script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Photo & Video toggle logic
            const toggleMediaBtn = document.getElementById('toggle_media_btn');
            const iconVideo = document.getElementById('icon_video');
            const iconPhoto = document.getElementById('icon_photo');
            const photoArea = document.getElementById('photo_area');
            const videoArea = document.getElementById('video_area');
            const videoEl = document.getElementById('movement_video');

            let isVideoActive = false;

            toggleMediaBtn.addEventListener('click', () => {
                isVideoActive = !isVideoActive;
                if (isVideoActive) {
                    iconVideo.classList.add('hidden');
                    iconPhoto.classList.remove('hidden');
                    photoArea.classList.add('hidden');
                    videoArea.classList.remove('hidden');
                    if (videoEl) {
                        videoEl.play().catch(e => console.log("Video auto play blocked: ", e));
                    }
                } else {
                    iconVideo.classList.remove('hidden');
                    iconPhoto.classList.add('hidden');
                    photoArea.classList.remove('hidden');
                    videoArea.classList.add('hidden');
                    if (videoEl) {
                        videoEl.pause();
                    }
                }
            });

            // Autoplay functionality
            const autoplayBtn = document.getElementById('autoplay_btn');
            const autoplayIcon = document.getElementById('autoplay_icon');
            const nextStep = "{{ $nextStep }}";
            let autoplayInterval = null;
            let isAutoplayActive = false;

            function toggleAutoplay() {
                isAutoplayActive = !isAutoplayActive;
                
                if (isAutoplayActive) {
                    // Activate styling
                    autoplayBtn.style.backgroundColor = "{{ $color }}";
                    autoplayBtn.style.color = "white";
                    autoplayIcon.classList.add('animate-spin');

                    // If it is the last step, notify completed or reset
                    if (!nextStep) {
                        setTimeout(() => {
                            alert("Anda telah mencapai gerakan terakhir!");
                            toggleAutoplay();
                        }, 500);
                        return;
                    }

                    // Set 7 seconds countdown redirect
                    autoplayInterval = setTimeout(() => {
                        window.location.href = `/gerakan/${nextStep}?mode=dewasa`;
                    }, 7000);
                } else {
                    // Reset styling
                    autoplayBtn.style.backgroundColor = "";
                    autoplayBtn.style.color = "";
                    autoplayIcon.classList.remove('animate-spin');

                    if (autoplayInterval) {
                        clearTimeout(autoplayInterval);
                    }
                }
            }

            autoplayBtn.addEventListener('click', toggleAutoplay);
        });
    </script>
@endsection
