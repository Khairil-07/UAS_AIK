@extends('layouts.app')

@section('title','Belajar Sholat Muhammadiyah')

@section('content')

<!-- ========================================= -->
<!-- HERO -->
<!-- ========================================= -->

<section class="pt-30 bg-white">

    <div class="max-w-6xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- LEFT -->

            <div>

                <span class="inline-flex items-center px-4 py-2 rounded-full border border-emerald-200 bg-emerald-50 text-sm font-medium text-emerald-700">

                    Platform Belajar Sholat

                </span>

                <h1 class="mt-8 text-5xl font-bold tracking-tight leading-tight text-slate-900">

                    Belajar Sholat

                    <span class="text-emerald-600">Sesuai</span>

                    Tuntunan Muhammadiyah

                </h1>

                <p class="mt-6 text-lg leading-8 text-slate-600">

                    Pelajari tata cara sholat melalui video gerakan, audio bacaan, tulisan Arab, latin, serta terjemahan Indonesia dengan tampilan yang sederhana dan mudah dipahami.

                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a href="#mode" class="inline-flex items-center rounded-xl bg-emerald-600 hover:bg-emerald-700 px-6 py-3 text-white transition">

                        Mulai Belajar

                    </a>

                    <a href="#fitur" class="inline-flex items-center rounded-xl border border-slate-300 hover:border-emerald-600 hover:text-emerald-600 px-6 py-3 transition">

                        Pelajari Fitur

                    </a>

                </div>

            </div>

            <!-- RIGHT -->

            <div>

                <div class="rounded-3xl border border-slate-200 overflow-hidden bg-white shadow-sm">

                    <img 
                    src="{{ asset('images/hero-sholat.png') }}"
                    class="w-full"
                    alt="Belajar Sholat">

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ========================================= -->
<!-- FEATURES -->
<!-- ========================================= -->

<section id="fitur" class="py-20 bg-slate-50">

    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto">

            <h2 class="text-3xl font-bold text-slate-900">

                Belajar Lebih Efektif

            </h2>

            <p class="mt-4 text-slate-600 leading-8">

                Semua materi dirancang agar proses belajar sholat menjadi
                lebih mudah dipahami, sistematis, dan nyaman digunakan.

            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mt-14">

            <!-- Card -->

            <div class="bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">

                <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 text-emerald-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14"/>

                        <rect x="3" y="6"
                            width="12"
                            height="12"
                            rx="2"
                            stroke-width="2"/>

                    </svg>

                </div>

                <h3 class="mt-5 font-semibold text-lg">

                    Video Gerakan

                </h3>

                <p class="mt-2 text-slate-600 text-sm leading-7">

                    Video berkualitas tinggi membantu memahami setiap gerakan sholat.

                </p>

            </div>

            <!-- Card -->

            <div class="bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">

                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 text-blue-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 19V6l12-2v13"/>

                        <circle cx="6" cy="18" r="3"/>

                        <circle cx="18" cy="16" r="3"/>

                    </svg>

                </div>

                <h3 class="mt-5 font-semibold text-lg">

                    Audio Bacaan

                </h3>

                <p class="mt-2 text-slate-600 text-sm leading-7">

                    Dengarkan bacaan Arab dan terjemahan Indonesia dengan jelas.

                </p>

            </div>

            <!-- Card -->

            <div class="bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">

                <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 text-amber-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6v12m6-6H6"/>

                    </svg>

                </div>

                <h3 class="mt-5 font-semibold text-lg">

                    Bacaan Lengkap

                </h3>

                <p class="mt-2 text-slate-600 text-sm leading-7">

                    Arab, latin, dan terjemahan tersedia pada setiap gerakan.

                </p>

            </div>

            <!-- Card -->

            <div class="bg-white border border-slate-200 rounded-2xl p-6 hover:shadow-md transition">

                <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 text-purple-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 17v-6h13"/>

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 5H5v14h14v-8"/>

                    </svg>

                </div>

                <h3 class="mt-5 font-semibold text-lg">

                    Progress Belajar

                </h3>

                <p class="mt-2 text-slate-600 text-sm leading-7">

                    Ikuti urutan pembelajaran dari awal hingga akhir dengan mudah.

                </p>

            </div>

        </div>

    </div>

</section>
<!-- ========================================= -->
<!-- MODE BELAJAR -->
<!-- ========================================= -->

<section id="mode" class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Heading -->

        <div class="max-w-2xl">

            <span class="text-sm font-semibold tracking-wide text-emerald-600 uppercase">

                Pilih Mode

            </span>

            <h2 class="mt-3 text-3xl font-bold text-slate-900">

                Belajar Sesuai Kebutuhan

            </h2>

            <p class="mt-4 text-slate-600 leading-8">

                Pilih mode pembelajaran yang paling sesuai dengan usia dan
                kebutuhan Anda.

            </p>

        </div>

        <!-- Cards -->

        <div class="grid lg:grid-cols-2 gap-8 mt-12">

            <!-- ===================== -->
            <!-- MODE ANAK -->
            <!-- ===================== -->

            <div class="rounded-3xl border border-slate-200 p-8 hover:border-sky-300 hover:shadow-lg transition">

                <span class="inline-flex items-center px-3 py-1 rounded-full bg-sky-100 text-sky-700 text-sm font-medium">

                    Mode Anak

                </span>

                <h3 class="mt-5 text-2xl font-semibold text-slate-900">

                    Belajar dengan Tampilan Ceria

                </h3>

                <p class="mt-4 text-slate-600 leading-8">

                    Dirancang agar anak-anak lebih mudah mengenali urutan
                    gerakan sholat melalui tampilan yang sederhana,
                    ilustrasi, video, dan audio.

                </p>

                <ul class="mt-8 space-y-3 text-slate-600">

                    <li class="flex items-center gap-3">

                        <span class="w-2 h-2 rounded-full bg-sky-500"></span>

                        Tampilan ramah anak

                    </li>

                    <li class="flex items-center gap-3">

                        <span class="w-2 h-2 rounded-full bg-sky-500"></span>

                        Video gerakan

                    </li>

                    <li class="flex items-center gap-3">

                        <span class="w-2 h-2 rounded-full bg-sky-500"></span>

                        Audio bacaan

                    </li>

                </ul>

                <a href="{{ route('gerakan.index',$modeAnak->id) }}" class="inline-flex mt-8 px-5 py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white transition">

                    Masuk Mode Anak

                </a>

            </div>

            <!-- ===================== -->
            <!-- MODE DEWASA -->
            <!-- ===================== -->

            <div class="rounded-3xl border border-slate-200 p-8 hover:border-emerald-300 hover:shadow-lg transition">

                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-sm font-medium">

                    Mode Dewasa

                </span>

                <h3 class="mt-5 text-2xl font-semibold text-slate-900">

                    Pembelajaran Lebih Lengkap

                </h3>

                <p class="mt-4 text-slate-600 leading-8">

                    Menyediakan materi yang lebih lengkap disertai
                    video, audio, bacaan Arab, latin,
                    terjemahan, dan progress pembelajaran.

                </p>

                <ul class="mt-8 space-y-3 text-slate-600">

                    <li class="flex items-center gap-3">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        Video HD

                    </li>

                    <li class="flex items-center gap-3">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        Audio Arab & Indonesia

                    </li>

                    <li class="flex items-center gap-3">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        Progress belajar

                    </li>

                </ul>

                <a href="{{ route('gerakan.index',$modeDewasa->id) }}" class="inline-flex mt-8 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white transition">

                    Masuk Mode Dewasa

                </a>

            </div>

        </div>

    </div>

</section>
<!-- ========================================= -->
<!-- TENTANG -->
<!-- ========================================= -->

<section id="tentang" class="py-20 bg-slate-50">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Left -->

            <div>

                <span class="text-sm font-semibold uppercase tracking-wider text-emerald-600">

                    Tentang Aplikasi

                </span>

                <h2 class="mt-4 text-3xl font-bold text-slate-900 leading-tight">

                    Media Pembelajaran
                    Sholat Berbasis Website

                </h2>

                <p class="mt-6 text-slate-600 leading-8">

                    Aplikasi ini dirancang untuk membantu masyarakat
                    mempelajari tata cara sholat sesuai tuntunan
                    Muhammadiyah secara lebih mudah melalui media
                    pembelajaran digital yang interaktif.

                </p>

                <p class="mt-5 text-slate-600 leading-8">

                    Seluruh materi disusun secara sistematis mulai dari
                    gerakan sholat, bacaan Arab, latin, terjemahan,
                    audio hingga video pembelajaran sehingga proses
                    belajar menjadi lebih efektif.

                </p>

            </div>

            <!-- Right -->

            <div class="grid grid-cols-2 gap-5">

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                    <h3 class="text-3xl font-bold text-emerald-600">

                        15+

                    </h3>

                    <p class="mt-2 text-slate-600">

                        Gerakan Sholat

                    </p>

                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                    <h3 class="text-3xl font-bold text-emerald-600">

                        HD

                    </h3>

                    <p class="mt-2 text-slate-600">

                        Video Gerakan

                    </p>

                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                    <h3 class="text-3xl font-bold text-emerald-600">

                        Audio

                    </h3>

                    <p class="mt-2 text-slate-600">

                        Arab & Indonesia

                    </p>

                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

                    <h3 class="text-3xl font-bold text-emerald-600">

                        2

                    </h3>

                    <p class="mt-2 text-slate-600">

                        Mode Belajar

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ========================================= -->
<!-- PREVIEW APLIKASI -->
<!-- ========================================= -->

<section class="py-20 bg-white">

    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto">

            <span class="text-sm font-semibold uppercase tracking-widest text-emerald-600">

                Preview

            </span>

            <h2 class="mt-4 text-3xl font-bold text-slate-900">

                Tampilan Pembelajaran

            </h2>

            <p class="mt-4 text-slate-600 leading-8">

                Antarmuka dibuat sederhana agar proses belajar terasa nyaman
                baik untuk anak-anak maupun orang dewasa.

            </p>

        </div>

        <div class="grid lg:grid-cols-2 gap-8 mt-14">

            <!-- Preview Anak -->

            <div class="group">

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 shadow-sm">

                    <img
                        src="{{ asset('images/icon-anak.png') }}"
                        alt="Preview Mode Anak"
                        class="w-full group-hover:scale-105 transition duration-500">

                </div>

                <div class="mt-5">

                    <span class="text-sm text-sky-600 font-medium">

                        MODE ANAK

                    </span>

                    <h3 class="mt-2 text-xl font-semibold text-slate-900">

                        Tampilan Ceria dan Mudah Dipahami

                    </h3>

                    <p class="mt-3 text-slate-600 leading-7">

                        Menggunakan ilustrasi, video, dan audio untuk membantu
                        anak memahami setiap gerakan sholat.

                    </p>

                </div>

            </div>

            <!-- Preview Dewasa -->

            <div class="group">

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 shadow-sm">

                    <img
                        src="{{ asset('images/icon-dewasa.png') }}"
                        alt="Preview Mode Dewasa"
                        class="w-full group-hover:scale-105 transition duration-500">

                </div>

                <div class="mt-5">

                    <span class="text-sm text-emerald-600 font-medium">

                        MODE DEWASA

                    </span>

                    <h3 class="mt-2 text-xl font-semibold text-slate-900">

                        Materi Lengkap dan Terstruktur

                    </h3>

                    <p class="mt-3 text-slate-600 leading-7">

                        Menampilkan video, bacaan Arab, latin,
                        terjemahan, audio serta progress pembelajaran.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>