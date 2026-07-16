@extends('layouts.app')

@section('title', $gerakan->nama_gerakan)

@section('content')

<div class="min-h-screen pt-24 bg-gradient-to-br from-slate-100 via-sky-50 to-emerald-50">

    {{-- =========================
            BREADCRUMB
    ========================= --}}

    <div class="max-w-7xl mx-auto px-6 pt-8">

        <div class="flex flex-wrap items-center gap-2 text-sm">

            <a
                href="{{ url('/') }}"
                class="bg-white px-4 py-2 rounded-full shadow hover:bg-sky-50 transition">

                🏠 Home

            </a>

            <span class="text-gray-400">→</span>

            <a
                href="{{ url()->previous() }}"
                class="bg-white px-4 py-2 rounded-full shadow hover:bg-sky-50 transition">

                📖 Daftar Gerakan

            </a>

            <span class="text-gray-400">→</span>

            <span
                class="px-4 py-2 rounded-full bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow">

                {{ $gerakan->nama_gerakan }}

            </span>

        </div>

    </div>




    <div class="max-w-7xl mx-auto px-6 py-8">

        <div class="grid lg:grid-cols-12 gap-8 items-start">



            {{-- ==========================================
                    PANEL KIRI
            =========================================== --}}

            <div class="lg:col-span-5">

                <div
                    class="sticky top-24 bg-white rounded-3xl overflow-hidden shadow-xl border border-sky-100">

                    <div
                        class="bg-gradient-to-br from-sky-100 via-white to-emerald-100 p-6">

                        <img
                            src="{{ asset('storage/'.$gerakan->gambar_anak) }}"
                            alt="{{ $gerakan->nama_gerakan }}"
                            class="w-full max-h-[520px] object-contain mx-auto hover:scale-105 transition duration-500">

                    </div>

                    <div class="p-6">

                        <div class="flex justify-center">

                            <span
                                class="bg-sky-100 text-sky-700 px-4 py-2 rounded-full font-semibold">

                                👦 Mode Anak

                            </span>

                        </div>

                    </div>

                </div>

            </div>




            {{-- ==========================================
                    PANEL KANAN
            =========================================== --}}

            <div class="lg:col-span-7 space-y-6">



                {{-- HEADER --}}

                <div
                    class="bg-white rounded-3xl border border-sky-100 shadow-lg p-7">

                    <div class="flex justify-between items-start">

                        <div>

                            <span
                                class="inline-block px-3 py-1 rounded-full bg-sky-100 text-sky-700 text-sm font-semibold">

                                Gerakan {{ $current }} dari {{ $totalGerakan }}

                            </span>

                            <h1
                                class="text-4xl font-extrabold text-slate-800 mt-4">

                                {{ $gerakan->nama_gerakan }}

                            </h1>

                            <p class="text-gray-500 mt-2">

                                Pelajari gerakan sholat sesuai tuntunan Muhammadiyah.

                            </p>

                        </div>

                        <div class="text-6xl">

                            🕌

                        </div>

                    </div>



                    {{-- Progress --}}

                    <div class="mt-7">

                        <div class="flex justify-between mb-2">

                            <span class="text-gray-500">

                                Progress Belajar

                            </span>

                            <span class="font-bold text-sky-600">

                                {{ round($progress) }}%

                            </span>

                        </div>

                        <div
                            class="h-3 rounded-full bg-gray-200 overflow-hidden">

                            <div
                                class="h-3 rounded-full bg-gradient-to-r from-sky-500 to-emerald-500"
                                style="width:{{ $progress }}%">

                            </div>

                        </div>

                    </div>

                </div>



                @php
                    $totalBacaan = $gerakan->bacaans->count();
                @endphp
                @if($totalBacaan > 1)

<div
    x-data="{ aktif: 0 }"
    class="space-y-6">

    {{-- =========================
            TAB DOA
    ========================== --}}

    <div class="bg-white rounded-3xl shadow-lg border border-sky-100 p-4">

        <div class="flex flex-wrap gap-3">

            @foreach($gerakan->bacaans as $index => $bacaan)

            <button
                @click="aktif={{ $index }}"
                :class="aktif=={{ $index }}
                    ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow'
                    : 'bg-gray-100 text-gray-700 hover:bg-sky-100'"
                class="px-5 py-3 rounded-2xl font-semibold transition">

                {{ $bacaan->judul }}

            </button>

            @endforeach

        </div>

    </div>



    {{-- =========================
            ISI TAB
    ========================== --}}

    @foreach($gerakan->bacaans as $index => $bacaan)

    <div
        x-show="aktif=={{ $index }}"
        x-transition
        class="space-y-6">

        {{-- =========================
                BACAAN ARAB
        ========================== --}}

        <div class="bg-gradient-to-br from-emerald-50 via-white to-sky-50 rounded-3xl border border-emerald-100 shadow-lg p-8">

            <div class="flex items-center gap-4 mb-6">

                <div class="w-14 h-14 rounded-full bg-emerald-500 text-white flex items-center justify-center text-2xl">

                    📖

                </div>

                <div>

                    <h2 class="text-2xl font-bold text-emerald-700">

                        {{ $bacaan->judul }}

                    </h2>

                    <p class="text-gray-500">

                        Bacaan Arab

                    </p>

                </div>

            </div>

            <div class="bg-white rounded-2xl border border-emerald-100 p-8">

                <p class="text-right text-5xl leading-loose font-serif text-slate-800">

                    {{ $bacaan->teks_arab }}

                </p>

            </div>

        </div>



        {{-- =========================
                LATIN + AUDIO ARAB
        ========================== --}}

        <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-sky-100">

            <div class="bg-gradient-to-r from-sky-500 to-blue-500 text-white px-6 py-4 flex items-center gap-3">

                <span class="text-2xl">🎧</span>

                <div>

                    <h2 class="font-bold text-lg">

                        Latin & Audio Arab

                    </h2>

                    <p class="text-sm text-sky-100">

                        Baca sambil mendengarkan pelafalan

                    </p>

                </div>

            </div>

            <div class="p-6 space-y-6">

                <p class="italic text-lg leading-9 text-gray-700">

                    {{ $bacaan->teks_latin }}

                </p>

                @if($bacaan->audio_url)

                <audio controls class="w-full">

                    <source
                        src="{{ asset('storage/'.$bacaan->audio_url) }}"
                        type="audio/mpeg">

                </audio>

                @endif

            </div>

        </div>



        {{-- =========================
                ARTI + AUDIO INDONESIA
        ========================== --}}

        <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-emerald-100">

            <div class="bg-gradient-to-r from-emerald-500 to-green-500 text-white px-6 py-4 flex items-center gap-3">

                <span class="text-2xl">🇮🇩</span>

                <div>

                    <h2 class="font-bold text-lg">

                        Arti & Audio Indonesia

                    </h2>

                    <p class="text-sm text-emerald-100">

                        Memahami makna bacaan

                    </p>

                </div>

            </div>

            <div class="p-6 space-y-6">

                <p class="text-lg leading-9 text-gray-700">

                    {{ $bacaan->terjemahan }}

                </p>

                @if($bacaan->audio_indonesia)

                <audio controls class="w-full">

                    <source
                        src="{{ asset('storage/'.$bacaan->audio_indonesia) }}"
                        type="audio/mpeg">

                </audio>

                @endif

            </div>

        </div>

    </div>

    @endforeach

</div>

@else

@php
    $bacaan = $gerakan->bacaans->first();
@endphp
@if($bacaan)

{{-- =========================
        BACAAN ARAB
========================= --}}

<div class="bg-gradient-to-br from-emerald-50 via-white to-sky-50 rounded-3xl border border-emerald-100 shadow-lg p-8">

    <div class="flex items-center gap-4 mb-6">

        <div class="w-14 h-14 rounded-full bg-emerald-500 text-white flex items-center justify-center text-2xl">

            📖

        </div>

        <div>

            <h2 class="text-2xl font-bold text-emerald-700">

                {{ $bacaan->judul }}

            </h2>

            <p class="text-gray-500">

                Bacaan Arab

            </p>

        </div>

    </div>

    <div class="bg-white rounded-2xl border border-emerald-100 p-8">

        <p class="text-right text-5xl leading-loose font-serif text-slate-800">

            {{ $bacaan->teks_arab }}

        </p>

    </div>

</div>



{{-- =========================
        LATIN + AUDIO ARAB
========================= --}}

<div class="bg-white rounded-3xl overflow-hidden border border-sky-100 shadow-lg">

    <div class="bg-gradient-to-r from-sky-500 to-blue-500 text-white px-6 py-4">

        <h2 class="text-xl font-bold">

            🎧 Latin & Audio Arab

        </h2>

    </div>

    <div class="p-6 space-y-6">

        <p class="italic text-lg leading-9 text-gray-700">

            {{ $bacaan->teks_latin }}

        </p>

        @if($bacaan->audio_url)

        <audio controls class="w-full">

            <source
                src="{{ asset('storage/'.$bacaan->audio_url) }}"
                type="audio/mpeg">

        </audio>

        @endif

    </div>

</div>



{{-- =========================
        TERJEMAHAN + AUDIO
========================= --}}

<div class="bg-white rounded-3xl overflow-hidden border border-emerald-100 shadow-lg">

    <div class="bg-gradient-to-r from-emerald-500 to-green-500 text-white px-6 py-4">

        <h2 class="text-xl font-bold">

            🇮🇩 Arti & Audio Indonesia

        </h2>

    </div>

    <div class="p-6 space-y-6">

        <p class="text-lg leading-9 text-gray-700">

            {{ $bacaan->terjemahan }}

        </p>

        @if($bacaan->audio_indonesia)

        <audio controls class="w-full">

            <source
                src="{{ asset('storage/'.$bacaan->audio_indonesia) }}"
                type="audio/mpeg">

        </audio>

        @endif

    </div>

</div>

@endif

@endif
<div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="bg-gradient-to-r from-red-600 to-rose-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            🎥 Video Gerakan Sholat
        </h2>
    </div>
    <div class="p-6">
        <div class="relative w-full pt-[56.25%] rounded-2xl overflow-hidden bg-black">
            @php
                // Cek apakah mode saat ini adalah mode anak
                $isAnak = str_contains(strtolower($gerakan->mode->nama_mode), 'anak');
                
                // 1. Tentukan detik MULAI gerakan saat ini
                $startTime = $isAnak ? $gerakan->video_start_anak : $gerakan->video_start_dewasa;
                
                // 2. Tentukan detik BERHENTI (otomatis mengambil detik mulai dari gerakan selanjutnya)
                $endTime = null;
                if ($next) {
                    $endTime = $isAnak ? $next->video_start_anak : $next->video_start_dewasa;
                }

                // 3. Ambil data skip dari database
                $skipStart = $isAnak ? $gerakan->skip_start_anak : $gerakan->skip_start_dewasa;
                $skipEnd = $isAnak ? $gerakan->skip_end_anak : $gerakan->skip_end_dewasa;
            @endphp
            
            {{-- PERBAIKAN: Menambahkan id="videoPembelajaran" dan merapikan tautan src iframe --}}
            <iframe 
                id="videoPembelajaran"
                class="absolute top-0 left-0 w-full h-full"
                src="https://www.youtube.com/embed/{{ $gerakan->mode->video_pembelajaran }}?start={{ $startTime }}&enablejsapi=1" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

{{-- ===========================================
        CARA MELAKUKAN
=========================================== --}}
<div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            📌 Cara Melakukan Gerakan
        </h2>
    </div>
    <div class="p-8">
        <div class="bg-orange-50 rounded-2xl border border-orange-100 p-6">
            <p class="leading-9 text-lg text-gray-700">
                {{ $gerakan->deskripsi }}
            </p>
        </div>
    </div>
</div>

{{-- ===========================================
        INFORMASI, TIPS & MOTIVASI
=========================================== --}}
<div class="grid md:grid-cols-3 gap-6">
    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center gap-3 mb-5">
            <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">
                📋
            </div>
            <h3 class="font-bold text-lg">Informasi</h3>
        </div>
        <div class="space-y-4">
            <div class="flex justify-between">
                <span class="text-gray-500">Mode</span>
                <span class="font-semibold text-green-700">{{ $gerakan->mode->nama_mode }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Urutan</span>
                <span class="font-semibold">{{ $gerakan->urutan }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Jumlah Bacaan</span>
                <span class="font-semibold">{{ $gerakan->bacaans->count() }}</span>
            </div>
        </div>
    </div>

    {{-- Tips --}}
    <div class="bg-gradient-to-br from-green-600 to-emerald-700 rounded-3xl p-6 text-white shadow-xl">
        <div class="text-5xl mb-5">💡</div>
        <h3 class="text-2xl font-bold">Tips Belajar</h3>
        <p class="mt-4 leading-8 text-green-100">
            Dengarkan audio Arab, pahami artinya melalui audio Indonesia, kemudian praktikkan gerakannya sambil melihat video agar lebih mudah dipahami.
        </p>
    </div>

    {{-- Motivasi --}}
    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
        <div class="text-5xl">🌙</div>
        <h3 class="mt-4 font-bold text-xl">Motivasi</h3>
        <blockquote class="mt-5 italic text-gray-600 leading-8 border-l-4 border-green-600 pl-4">
            "Dirikanlah shalat untuk mengingat-Ku."
        </blockquote>
        <p class="mt-4 text-sm text-gray-400">QS. Thaha : 14</p>
    </div>
</div>

</div> {{-- Penutup PANEL KANAN --}}
</div> {{-- Penutup GRID --}}
</div> {{-- Penutup CONTAINER ATAS --}}

{{-- ===========================================
        PAGINASI (PREVIOUS / NEXT)
=========================================== --}}
<div class="max-w-7xl mx-auto px-6 pb-16 mt-8">
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6">
        <div class="grid grid-cols-3 gap-5 items-center">
            {{-- Previous --}}
            <div>
                @if($previous)
                <a href="{{ route('gerakan.show', $previous->id) }}" class="flex items-center gap-3 bg-gray-100 hover:bg-gray-200 rounded-2xl p-4 transition">
                    <div class="text-3xl">⬅️</div>
                    <div>
                        <p class="text-xs text-gray-500">Sebelumnya</p>
                        <p class="font-semibold text-sm md:text-base">{{ $previous->nama_gerakan }}</p>
                    </div>
                </a>
                @else
                <div class="bg-gray-100 rounded-2xl p-4 text-center text-gray-400 text-sm">
                    Awal Gerakan
                </div>
                @endif
            </div>

            {{-- Tengah --}}
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 md:w-24 md:h-24 rounded-full bg-gradient-to-br from-green-600 to-emerald-500 text-white shadow-xl">
                    <div>
                        <div class="text-2xl md:text-3xl font-bold">{{ $current }}</div>
                        <div class="text-xs md:text-sm">/ {{ $totalGerakan }}</div>
                    </div>
                </div>
            </div>

            {{-- Next --}}
            <div>
                @if($next)
                <a href="{{ route('gerakan.show', $next->id) }}" class="flex justify-end items-center gap-3 bg-green-600 hover:bg-green-700 text-white rounded-2xl p-4 transition">
                    <div class="text-right">
                        <p class="text-xs text-green-100">Selanjutnya</p>
                        <p class="font-semibold text-sm md:text-base">{{ $next->nama_gerakan }}</p>
                    </div>
                    <div class="text-3xl">➡️</div>
                </a>
                @else
                <div class="bg-green-600 rounded-2xl p-4 text-center text-white font-bold text-sm">
                    ✔ Pembelajaran Selesai
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


{{{-- JAVASCRIPT BARU UNTUK YOUTUBE (DENGAN PERBAIKAN REPLAY / BISA DIPUTAR LAGI) --}}
<script src="https://www.youtube.com/iframe_api"></script>
<script>
    let player;
    let tracker = null; // Menyimpan interval pemantau durasi

    // Otomatis dipanggil setelah pustaka YouTube API selesai dimuat
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('videoPembelajaran', {
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerStateChange(event) {
        // 1. JIKA VIDEO ACTIVE DIPUTAR (PLAYING = 1)
        if (event.data == YT.PlayerState.PLAYING) {
            
            const skipStart = {{ $skipStart ?? 'null' }};
            const skipEnd = {{ $skipEnd ?? 'null' }};
            const startTime = {{ $startTime ?? 0 }};
            const endTime = {{ $endTime ?? 'null' }};

            // Bersihkan tracker lama jika ada untuk mencegah bentrok
            if (tracker !== null) clearInterval(tracker);

            tracker = setInterval(() => {
                // Hentikan pemantauan jika video dijeda manual oleh pengguna
                if (player.getPlayerState() !== YT.PlayerState.PLAYING) {
                    clearInterval(tracker);
                    tracker = null;
                    return;
                }

                let currentTime = player.getCurrentTime();

                // LOGIKA SKIP BAGIAN TENGAH
                if (skipStart !== null && skipEnd !== null) {
                    if (currentTime >= skipStart && currentTime < skipEnd) {
                        player.seekTo(skipEnd, true);
                        console.log(`Berhasil melompati menit tengah dari detik ${skipStart} ke ${skipEnd}`);
                    }
                }

                // LOGIKA PAUSE OTOMATIS (Batas waktu gerakan selesai)
                if (endTime !== null && currentTime >= endTime) {
                    player.pauseVideo();
                    
                    // PENTING: Matikan tracker agar tombol play YouTube bisa merespons klik berikutnya
                    clearInterval(tracker);
                    tracker = null; 

                    console.log(`Video dijeda otomatis di detik ${endTime}`);
                }
            }, 200);
        }

        // 2. JIKA VIDEO SELESAI SEUTUHNYAATAU DI-RESET (ENDED = 0 / PAUSED)
        // Jika user klik Play lagi setelah video habis/jeda otomatis, kita kembalikan ke detik start asal
        if (event.data == YT.PlayerState.PAUSED && player.getCurrentTime() >= {{ $endTime ?? 99999 }}) {
            player.seekTo({{ $startTime ?? 0 }}, true);
        }
    }
</script>
@endsection