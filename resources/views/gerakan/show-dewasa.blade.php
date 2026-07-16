@extends('layouts.app')

@section('title', $gerakan->nama_gerakan)

@section('content')

<div class="min-h-screen pt-24 bg-gradient-to-br from-slate-100 via-gray-50 to-emerald-50">

    {{-- =========================
            BREADCRUMB
    ========================= --}}

    <div class="max-w-7xl mx-auto px-6 py-5">

        <div class="flex flex-wrap items-center gap-2 text-sm">

            <a
                href="{{ url('/') }}"
                class="bg-white px-4 py-2 rounded-full shadow hover:bg-green-50 transition">

                🏠 Home

            </a>

            <span class="text-gray-400">→</span>

            <a
                href="{{ url()->previous() }}"
                class="bg-white px-4 py-2 rounded-full shadow hover:bg-green-50 transition">

                📖 Daftar Gerakan

            </a>

            <span class="text-gray-400">→</span>

            <span
                class="bg-gradient-to-r from-green-700 to-emerald-600 text-white px-4 py-2 rounded-full shadow">

                {{ $gerakan->nama_gerakan }}

            </span>

        </div>

    </div>



    <div class="max-w-7xl mx-auto px-6 pb-12">

        <div class="grid lg:grid-cols-12 gap-8 items-start">
            {{-- =======================================
                    PANEL KIRI
            ======================================== --}}

            <div class="lg:col-span-5">

                <div
                    class="sticky top-24 bg-white rounded-3xl overflow-hidden shadow-xl border border-green-100">

                    {{-- Header --}}

                    <div
                        class="bg-gradient-to-r from-green-700 to-emerald-600 p-6 text-center">

                        <span
                            class="inline-flex items-center gap-2 bg-white/20 text-white px-4 py-2 rounded-full">

                            🕌 Mode Dewasa

                        </span>

                        <h2 class="text-white text-2xl font-bold mt-4">

                            {{ $gerakan->nama_gerakan }}

                        </h2>

                    </div>



                    {{-- Gambar --}}

                    <div
                        class="p-6 bg-gradient-to-br from-white to-green-50">

                        <img
                            src="{{ asset('storage/'.$gerakan->gambar_dewasa) }}"
                            alt="{{ $gerakan->nama_gerakan }}"
                            class="w-full max-h-[520px] object-contain mx-auto transition duration-500 hover:scale-105">

                    </div>



                    {{-- Progress --}}

                    <div class="px-6 pb-6">

                        <div class="flex justify-between text-sm text-gray-500 mb-2">

                            <span>

                                Progress Belajar

                            </span>

                            <span>

                                {{ $current }} / {{ $totalGerakan }}

                            </span>

                        </div>

                        <div
                            class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">

                            <div
                                class="h-3 rounded-full bg-gradient-to-r from-green-600 to-emerald-500"
                                style="width: {{ $progress }}%">

                            </div>

                        </div>

                    </div>

                </div>

            </div>
                        {{-- =======================================
                    PANEL KANAN
            ======================================== --}}

            <div class="lg:col-span-7 space-y-6">

                {{-- HEADER --}}

                <div
                    class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">

                    <div class="flex justify-between items-start">

                        <div>

                            <span
                                class="inline-flex bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">

                                Gerakan {{ $current }} dari {{ $totalGerakan }}

                            </span>

                            <h1
                                class="text-4xl font-bold text-gray-800 mt-4">

                                {{ $gerakan->nama_gerakan }}

                            </h1>

                            <p
                                class="mt-4 text-lg text-gray-600 leading-8">

                                Pelajari gerakan sholat sesuai tuntunan Muhammadiyah secara bertahap.

                            </p>

                        </div>

                        <div class="text-6xl">

                            🕌

                        </div>

                    </div>

                </div>
                                @php
                    $totalBacaan = $gerakan->bacaans->count();
                @endphp

                @if($totalBacaan > 1)

                <div
                    x-data="{ aktif:0 }"
                    class="space-y-6">

                    {{-- TAB DOA --}}

                    <div
                        class="bg-white rounded-3xl shadow-lg border border-gray-100 p-3">

                        <div class="flex flex-wrap gap-3">

                            @foreach($gerakan->bacaans as $index => $bacaan)

                            <button
                                @click="aktif={{ $index }}"
                                :class="aktif=={{ $index }}
                                ? 'bg-green-600 text-white shadow'
                                : 'bg-gray-100 hover:bg-green-100 text-gray-700'"
                                class="px-5 py-3 rounded-xl transition font-semibold">

                                {{ $bacaan->judul }}

                            </button>

                            @endforeach

                        </div>

                    </div>
                                        {{-- ==========================
                            ISI SETIAP TAB
                    =========================== --}}

                    @foreach($gerakan->bacaans as $index => $bacaan)

                    <div
                        x-show="aktif=={{ $index }}"
                        x-transition.opacity.duration.300ms
                        class="space-y-6">

                        {{-- ==========================
                                BACAAN ARAB
                        =========================== --}}

                        <div
                            class="bg-white rounded-3xl shadow-lg border border-green-100 overflow-hidden">

                            <div
                                class="bg-gradient-to-r from-green-700 to-emerald-600 px-6 py-4">

                                <h2 class="text-white text-xl font-bold">

                                    📖 {{ $bacaan->judul }}

                                </h2>

                                <p class="text-green-100 text-sm mt-1">

                                    Bacaan Arab

                                </p>

                            </div>

                            <div class="p-8">

                                <div
                                    class="bg-green-50 border border-green-100 rounded-2xl p-8">

                                    <p
                                        class="text-right text-5xl leading-loose text-gray-800">

                                        {!! nl2br(e($bacaan->teks_arab)) !!}

                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- ==========================
                                LATIN + AUDIO ARAB
                        =========================== --}}

                        <div
                            class="bg-white rounded-3xl shadow-lg border border-blue-100 overflow-hidden">

                            <div
                                class="bg-gradient-to-r from-blue-600 to-sky-500 px-6 py-4 flex items-center gap-3">

                                <span class="text-2xl">

                                    🎧

                                </span>

                                <div>

                                    <h2 class="font-bold text-white">

                                        Transliterasi Latin

                                    </h2>

                                    <p class="text-blue-100 text-sm">

                                        Dengarkan sambil membaca latin

                                    </p>

                                </div>

                            </div>

                            <div class="p-6 space-y-6">

                                <div
                                    class="bg-blue-50 rounded-2xl border border-blue-100 p-6">

                                    <p
                                        class="italic text-lg leading-9 text-gray-700">

                                        {!! nl2br(e($bacaan->teks_latin)) !!}

                                    </p>

                                </div>

                                @if($bacaan->audio_url)

                                <audio controls preload="none" class="w-full">

                                    <source
                                        src="{{ asset('storage/'.$bacaan->audio_url) }}"
                                        type="audio/mpeg">

                                </audio>

                                @endif

                            </div>

                        </div>
                                                {{-- ==========================
                                TERJEMAHAN + AUDIO INDONESIA
                        =========================== --}}

                        <div
                            class="bg-white rounded-3xl shadow-lg border border-emerald-100 overflow-hidden">

                            <div
                                class="bg-gradient-to-r from-emerald-600 to-green-600 px-6 py-4 flex items-center gap-3">

                                <span class="text-2xl">

                                    🇮🇩

                                </span>

                                <div>

                                    <h2 class="font-bold text-white">

                                        Arti & Audio Indonesia

                                    </h2>

                                    <p class="text-emerald-100 text-sm">

                                        Memahami makna bacaan sholat

                                    </p>

                                </div>

                            </div>

                            <div class="p-6 space-y-6">

                                <div
                                    class="bg-emerald-50 rounded-2xl border border-emerald-100 p-6">

                                    <p
                                        class="text-gray-700 leading-9 text-lg">

                                        {!! nl2br(e($bacaan->terjemahan)) !!}

                                    </p>

                                </div>

                                @if($bacaan->audio_indonesia)

                                <audio controls preload="none" class="w-full">

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
                {{-- ==========================
        BACAAN ARAB
========================== --}}

<div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

    <div class="bg-gradient-to-r from-emerald-700 to-green-600 px-6 py-4">

        <h2 class="text-xl font-bold text-white">

            📖 {{ $bacaan->judul }}

        </h2>

    </div>

    <div class="p-8">

        <div class="bg-green-50 rounded-2xl border border-green-100 p-8">

            <p class="text-right text-5xl leading-loose text-gray-800">

                {!! nl2br(e($bacaan->teks_arab)) !!}

            </p>

        </div>

    </div>

</div>



{{-- ==========================
        LATIN + AUDIO ARAB
========================== --}}

<div class="bg-white rounded-3xl shadow-lg border border-blue-100 overflow-hidden">

    <div class="bg-gradient-to-r from-blue-600 to-sky-600 px-6 py-4 flex items-center gap-3">

        <span class="text-2xl">🎧</span>

        <div>

            <h2 class="font-bold text-white">

                Latin & Audio Arab

            </h2>

            <p class="text-blue-100 text-sm">

                Dengarkan sambil membaca latin

            </p>

        </div>

    </div>

    <div class="p-6 space-y-6">

        <div class="bg-blue-50 rounded-2xl border border-blue-100 p-6">

            <p class="italic text-lg leading-9 text-gray-700">

                {!! nl2br(e($bacaan->teks_latin)) !!}

            </p>

        </div>

        @if($bacaan->audio_url)

        <audio controls preload="none" class="w-full">

            <source
                src="{{ asset('storage/'.$bacaan->audio_url) }}"
                type="audio/mpeg">

        </audio>

        @endif

    </div>

</div>



{{-- ==========================
        TERJEMAHAN + AUDIO INDONESIA
========================== --}}

<div class="bg-white rounded-3xl shadow-lg border border-emerald-100 overflow-hidden">

    <div class="bg-gradient-to-r from-emerald-600 to-green-600 px-6 py-4 flex items-center gap-3">

        <span class="text-2xl">🇮🇩</span>

        <div>

            <h2 class="font-bold text-white">

                Arti & Audio Indonesia

            </h2>

            <p class="text-emerald-100 text-sm">

                Memahami makna bacaan

            </p>

        </div>

    </div>

    <div class="p-6 space-y-6">

        <div class="bg-emerald-50 rounded-2xl border border-emerald-100 p-6">

            <p class="leading-9 text-lg text-gray-700">

                {!! nl2br(e($bacaan->terjemahan)) !!}

            </p>

        </div>

        @if($bacaan->audio_indonesia)

        <audio controls preload="none" class="w-full">

            <source
                src="{{ asset('storage/'.$bacaan->audio_indonesia) }}"
                type="audio/mpeg">

        </audio>

        @endif

    </div>

</div>

@endif

@endif
{{-- ===========================================
        VIDEO GERAKAN
=========================================== --}}

<div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

    <div class="bg-gradient-to-r from-red-600 to-rose-600 px-6 py-4">

        <h2 class="text-xl font-bold text-white">
            🎥 Video Gerakan Sholat
        </h2>

    </div>

    <div class="p-6">

        <video
            id="videoPembelajaran"
            controls
            class="w-full rounded-2xl">

            <source
                src="{{ asset('storage/'.$gerakan->mode->video_pembelajaran) }}"
                type="video/mp4">

        </video>

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
        INFORMASI
=========================================== --}}

<div class="grid md:grid-cols-3 gap-6">

    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">

        <div class="flex items-center gap-3 mb-5">

            <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">

                📋

            </div>

            <h3 class="font-bold text-lg">

                Informasi

            </h3>

        </div>

        <div class="space-y-4">

            <div class="flex justify-between">

                <span class="text-gray-500">

                    Mode

                </span>

                <span class="font-semibold text-green-700">

                    {{ $gerakan->mode->nama_mode }}

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-500">

                    Urutan

                </span>

                <span class="font-semibold">

                    {{ $gerakan->urutan }}

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-500">

                    Jumlah Bacaan

                </span>

                <span class="font-semibold">

                    {{ $gerakan->bacaans->count() }}

                </span>

            </div>

        </div>

    </div>



    {{-- Tips --}}

    <div class="bg-gradient-to-br from-green-600 to-emerald-700 rounded-3xl p-6 text-white shadow-xl">

        <div class="text-5xl mb-5">

            💡

        </div>

        <h3 class="text-2xl font-bold">

            Tips Belajar

        </h3>

        <p class="mt-4 leading-8 text-green-100">

            Dengarkan audio Arab,
            pahami artinya melalui audio Indonesia,
            kemudian praktikkan gerakannya sambil melihat video agar lebih mudah dipahami.

        </p>

    </div>



    {{-- Motivasi --}}

    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">

        <div class="text-5xl">

            🌙

        </div>

        <h3 class="mt-4 font-bold text-xl">

            Motivasi

        </h3>

        <blockquote class="mt-5 italic text-gray-600 leading-8 border-l-4 border-green-600 pl-4">

            "Dirikanlah shalat untuk mengingat-Ku."

        </blockquote>

        <p class="mt-4 text-sm text-gray-400">

            QS. Thaha : 14

        </p>

    </div>

</div>



</div> {{-- PANEL KANAN --}}

</div> {{-- GRID --}}

</div> {{-- CONTAINER --}}
<div class="max-w-7xl mx-auto px-6 pb-16">

    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6">

        <div class="grid grid-cols-3 gap-5 items-center">

            {{-- Previous --}}
            <div>

                @if($previous)

                <a
                    href="{{ route('gerakan.show',$previous->id) }}"
                    class="flex items-center gap-3 bg-gray-100 hover:bg-gray-200 rounded-2xl p-4 transition">

                    <div class="text-3xl">

                        ⬅️

                    </div>

                    <div>

                        <p class="text-xs text-gray-500">

                            Sebelumnya

                        </p>

                        <p class="font-semibold">

                            {{ $previous->nama_gerakan }}

                        </p>

                    </div>

                </a>

                @else

                <div class="bg-gray-100 rounded-2xl p-4 text-center text-gray-400">

                    Awal Gerakan

                </div>

                @endif

            </div>



            {{-- Tengah --}}

            <div class="text-center">

                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-green-600 to-emerald-500 text-white shadow-xl">

                    <div>

                        <div class="text-3xl font-bold">

                            {{ $current }}

                        </div>

                        <div class="text-sm">

                            / {{ $totalGerakan }}

                        </div>

                    </div>

                </div>

            </div>



            {{-- Next --}}

            <div>

                @if($next)

                <a
                    href="{{ route('gerakan.show',$next->id) }}"
                    class="flex justify-end items-center gap-3 bg-green-600 hover:bg-green-700 text-white rounded-2xl p-4 transition">

                    <div class="text-right">

                        <p class="text-xs text-green-100">

                            Selanjutnya

                        </p>

                        <p class="font-semibold">

                            {{ $next->nama_gerakan }}

                        </p>

                    </div>

                    <div class="text-3xl">

                        ➡️

                    </div>

                </a>

                @else

                <div class="bg-green-600 rounded-2xl p-4 text-center text-white font-bold">

                    ✔ Pembelajaran Selesai

                </div>

                @endif

            </div>

        </div>

    </div>

</div>

</div>
<script>

document.addEventListener("DOMContentLoaded", function () {

    const video = document.getElementById("videoSholat");

    if (!video) return;

    video.addEventListener("loadedmetadata", function () {

        video.currentTime = {{ $videoStart }};

    });

});

</script>
@endsection