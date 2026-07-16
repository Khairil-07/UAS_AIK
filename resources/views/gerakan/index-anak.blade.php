@extends('layouts.app')

@section('title', 'Daftar Gerakan Sholat Anak')

@section('content')

<div class="min-h-screen bg-gray-50 pt-24">

    {{-- ===========================
        HEADER
    =========================== --}}
    <section class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <h1 class="text-4xl font-bold uppercase tracking-wide text-gray-800">

                Daftar Gerakan Sholat

            </h1>

            <p class="mt-3 text-gray-500">

                Mode Belajar Anak

            </p>

            <div class="mt-5 h-[2px] bg-gray-300 w-full"></div>

        </div>

    </section>

    {{-- ===========================
        SEARCH
    =========================== --}}
    <section class="max-w-7xl mx-auto px-6 mt-8">

        <div class="relative">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-5-5m2-5a7 7 0 11-14 0a7 7 0 0114 0z"/>

            </svg>

            <input
                id="searchGerakan"
                type="text"
                placeholder="Cari gerakan..."
                class="w-full rounded-lg border border-gray-300 bg-white py-3 pl-12 pr-5 focus:outline-none focus:ring-2 focus:ring-sky-500">

        </div>

    </section>

    {{-- ===========================
        GRID GERAKAN
    =========================== --}}
    <section class="max-w-7xl mx-auto px-6 py-12">

        <div
            id="gerakanGrid"
            class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($gerakans as $gerakan)

        <div
            class="gerakan-item bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-xl transition duration-300 group">

            {{-- Gambar --}}
            <div class="bg-sky-50 overflow-hidden">

                <img
                    src="{{ asset('storage/'.$gerakan->gambar_anak) }}"
                    alt="{{ $gerakan->nama_gerakan }}"
                    class="w-full h-60 object-contain group-hover:scale-105 transition duration-500">

            </div>

            {{-- Content --}}
            <div class="p-6">

                <div class="flex items-center justify-between">

                    <span
                        class="bg-sky-100 text-sky-700 text-xs font-semibold px-3 py-1 rounded-full">

                        Gerakan {{ $gerakan->urutan }}

                    </span>

                    @if($gerakan->video_start_anak)

                        <span class="text-red-500 text-xl">

                            🎥

                        </span>

                    @endif

                </div>

                <h3
                    class="gerakan-title mt-5 text-xl font-bold text-gray-800">

                    {{ $gerakan->nama_gerakan }}

                </h3>

                <p
                    class="mt-3 text-sm leading-7 text-gray-500">

                    {{ Str::limit(strip_tags($gerakan->deskripsi), 90) }}

                </p>

                {{-- Badge --}}
                <div class="flex flex-wrap gap-2 mt-5">

                    <span
                        class="bg-sky-100 text-sky-700 text-xs px-3 py-1 rounded-full">

                        📖 Materi

                    </span>

                    @if($gerakan->bacaans->count())

                    <span
                        class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">

                        🎧 Audio

                    </span>

                    @endif

                    @if($gerakan->video_start_anak)

                    <span
                        class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">

                        🎥 Video

                    </span>

                    @endif

                </div>

                {{-- Tombol --}}
                <a
                    href="{{ route('gerakan.show',$gerakan->id) }}"
                    class="mt-6 flex justify-center items-center w-full rounded-lg bg-sky-600 hover:bg-sky-700 text-white py-3 font-semibold transition">

                    Pelajari →

                </a>

            </div>

        </div>

        @endforeach

    </div>

</section>


{{-- ===========================
    SEARCH SCRIPT
=========================== --}}
<script>

document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("searchGerakan");

    const cards = document.querySelectorAll(".gerakan-item");

    input.addEventListener("keyup", function () {

        let keyword = this.value.toLowerCase();

        cards.forEach(function(card){

            let title = card.querySelector(".gerakan-title")
                            .innerText
                            .toLowerCase();

            if(title.includes(keyword)){

                card.style.display = "";

            }else{

                card.style.display = "none";

            }

        });

    });

});

</script>

@endsection