@extends('layouts.app')

@section('title', 'Daftar Gerakan Sholat')

@section('content')

<div class="min-h-screen bg-gray-100 pt-30">

    {{-- ===========================
            HEADER
    ============================ --}}
    <section class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <h1 class="text-4xl md:text-5xl font-bold uppercase tracking-wide text-gray-800">

                Daftar Gerakan Sholat

            </h1>

            <div class="mt-5 w-44 h-1 bg-green-700 mx-auto rounded-full"></div>

            <p class="mt-6 text-gray-500 text-lg">

                Pilih gerakan yang ingin dipelajari.

            </p>

        </div>

    </section>
        {{-- ===========================
            SEARCH
    ============================ --}}
    <section class="max-w-7xl mx-auto px-6 mt-10">

        <div class="relative">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-5-5m2-5a7 7 0 11-14 0a7 7 0 0114 0z"/>

            </svg>

            <input
                id="searchGerakan"
                type="text"
                placeholder="Cari gerakan sholat..."
                class="w-full bg-white border border-gray-300 rounded-xl py-4 pl-12 pr-4 shadow-sm focus:ring-2 focus:ring-green-600 focus:outline-none">

        </div>

    </section>


    {{-- ===========================
            DAFTAR GERAKAN
    ============================ --}}
    <section class="max-w-7xl mx-auto px-6 py-12">

        <div
            id="gerakanGrid"
            class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach($gerakans as $gerakan)

        <div
            class="gerakan-item bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition duration-300">

            {{-- Gambar --}}
            <div class="relative bg-gray-100 overflow-hidden">

                <img
                    src="{{ asset('storage/'.$gerakan->gambar_dewasa) }}"
                    alt="{{ $gerakan->nama_gerakan }}"
                    class="w-full h-64 object-contain bg-white group-hover:scale-105 transition duration-500">

                {{-- Nomor --}}
                <div
                    class="absolute top-4 left-4 w-11 h-11 rounded-full bg-green-700 text-white flex items-center justify-center font-bold shadow">

                    {{ $gerakan->urutan }}

                </div>

            </div>

            {{-- Isi Card --}}
            <div class="p-6">

                <h2
                    class="gerakan-title text-2xl font-bold text-gray-800">

                    {{ $gerakan->nama_gerakan }}

                </h2>

                <p
                    class="mt-4 text-gray-600 leading-7 text-sm">

                    {{ Str::limit(strip_tags($gerakan->deskripsi),120) }}

                </p>

                {{-- Badge --}}
                <div class="flex flex-wrap gap-2 mt-5">

                    <span
                        class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">

                        Materi

                    </span>

                    @if($gerakan->video_url)

                    <span
                        class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">

                        🎥 Video

                    </span>

                    @endif

                    @if($gerakan->bacaans->count())

                    <span
                        class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">

                        🎧 Audio

                    </span>

                    @endif

                </div>

                {{-- Progress --}}
                <div class="mt-6">

                    <div class="flex justify-between text-xs text-gray-500 mb-2">

                        <span>

                            Progress

                        </span>

                        <span>

                            {{ $gerakan->urutan }} / {{ $gerakans->count() }}

                        </span>

                    </div>

                    <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">

                        <div
                            class="h-2 rounded-full bg-green-700"
                            style="width: {{ ($gerakan->urutan / $gerakans->count()) * 100 }}%">

                        </div>

                    </div>

                </div>

                {{-- Tombol --}}
                <a
                    href="{{ route('gerakan.show',$gerakan->id) }}"
                    class="mt-7 inline-flex w-full items-center justify-center rounded-xl bg-green-700 hover:bg-green-800 text-white font-semibold py-3 transition duration-300">

                    Pelajari Gerakan
                    <span class="ml-2">→</span>

                </a>

            </div>

        </div>

        @endforeach

        </div>

    </section>
       
{{-- ===========================
        SEARCH SCRIPT
============================ --}}
<script>

document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("searchGerakan");

    const cards = document.querySelectorAll(".gerakan-item");

    input.addEventListener("keyup", function () {

        const keyword = this.value.toLowerCase();

        cards.forEach(function(card){

            const title = card.querySelector(".gerakan-title")
                              .innerText
                              .toLowerCase();

            if(title.includes(keyword)){

                card.style.display = "block";

            }else{

                card.style.display = "none";

            }

        });

    });

});

</script>

@endsection