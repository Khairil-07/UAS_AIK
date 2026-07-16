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
{{-- =========================
        VIDEO GERAKAN
========================= --}}
<div class="bg-white rounded-3xl overflow-hidden border border-red-100 shadow-lg">

    <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-4 flex items-center gap-3">

        <span class="text-2xl">🎥</span>

        <div>

            <h2 class="text-xl font-bold">
                Video Pembelajaran
            </h2>

            <p class="text-sm text-red-100">
                Video otomatis menuju gerakan yang sedang dipelajari
            </p>

        </div>

    </div>

    <div class="p-6">

        <video
            id="videoPembelajaran"
            controls
            preload="metadata"
            class="w-full rounded-2xl shadow">

            <source
                src="{{ asset('storage/'.$gerakan->mode->video_pembelajaran) }}"
                type="video/mp4">

            Browser Anda tidak mendukung video.

        </video>

    </div>

</div>



{{-- =========================
        CARA MELAKUKAN
========================= --}}

<div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-green-100">

    <div class="bg-gradient-to-r from-green-500 to-emerald-500 px-6 py-4">

        <h2 class="text-xl font-bold text-white flex items-center gap-2">

            🕌 Cara Melakukan Gerakan

        </h2>

    </div>

    <div class="p-7">

        <p class="leading-9 text-lg text-gray-700">

            {{ $gerakan->deskripsi }}

        </p>

    </div>

</div>



{{-- =========================
        NAVIGASI
========================= --}}

<div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">

    <div class="grid lg:grid-cols-3 gap-6 items-center">

        {{-- Previous --}}
        <div>

            @if($previous)

            <a
                href="{{ route('gerakan.show',$previous->id) }}"
                class="group flex items-center gap-4 bg-sky-50 hover:bg-sky-100 border border-sky-200 rounded-2xl p-4 transition">

                <div class="w-12 h-12 rounded-full bg-sky-500 text-white flex items-center justify-center group-hover:-translate-x-1 transition">

                    ←

                </div>

                <div>

                    <p class="text-xs text-gray-500">

                        Sebelumnya

                    </p>

                    <p class="font-bold text-sky-700">

                        {{ $previous->nama_gerakan }}

                    </p>

                </div>

            </a>

            @else

            <div class="rounded-2xl bg-gray-100 p-6 text-center">

                <div class="text-4xl mb-2">

                    🏁

                </div>

                <p class="font-semibold text-gray-500">

                    Awal Pembelajaran

                </p>

            </div>

            @endif

        </div>



        {{-- Tengah --}}
        <div class="text-center">

            <div class="mx-auto w-28 h-28 rounded-full bg-gradient-to-br from-sky-500 to-emerald-500 shadow-xl flex flex-col justify-center text-white">

                <span class="text-3xl font-bold">

                    {{ $current }}

                </span>

                <span class="text-sm">

                    dari {{ $totalGerakan }}

                </span>

            </div>

            <p class="mt-4 text-gray-500">

                Terus Semangat Belajar 💪

            </p>

        </div>



        {{-- Next --}}
        <div>

            @if($next)

            <a
                href="{{ route('gerakan.show',$next->id) }}"
                class="group flex items-center justify-between bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-2xl p-4 transition">

                <div>

                    <p class="text-xs text-gray-500">

                        Selanjutnya

                    </p>

                    <p class="font-bold text-emerald-700">

                        {{ $next->nama_gerakan }}

                    </p>

                </div>

                <div class="w-12 h-12 rounded-full bg-emerald-500 text-white flex items-center justify-center group-hover:translate-x-1 transition">

                    →

                </div>

            </a>

            @else

            <div class="rounded-2xl bg-green-100 border border-green-200 p-6 text-center">

                <div class="text-5xl">

                    🎉

                </div>

                <h3 class="font-bold text-green-700 mt-2">

                    Selamat!

                </h3>

                <p class="text-green-600 text-sm mt-1">

                    Semua gerakan telah selesai dipelajari.

                </p>

            </div>

            @endif

        </div>

    </div>

</div>

            </div> {{-- Panel Kanan --}}

        </div> {{-- Grid --}}

    </div> {{-- Container --}}

</div>
<script>

document.addEventListener("DOMContentLoaded", function () {

    const video = document.getElementById("videoPembelajaran");

    const startTime = {{ $videoStart }};

    if (!video) return;

    video.addEventListener("loadedmetadata", function () {

        console.log("loadedmetadata");

        video.currentTime = startTime;

    });

    video.addEventListener("seeked", function () {

        console.log("Berhasil lompat ke:", video.currentTime);

    });

    video.addEventListener("error", function () {

        console.log("Video error");

    });

});

</script>
@endsection