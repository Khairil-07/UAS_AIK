@extends('layouts.app')

@section('title', 'Panel Admin - Manajemen Konten')

@section('content')
    @php
        $accentColors = [
            "#059669","#0d9488","#0891b2","#2563eb",
            "#7c3aed","#9333ea","#c026d3","#e11d48",
            "#ea580c","#d97706","#65a30d","#16a34a",
        ];
    @endphp

    <div class="min-h-screen bg-gray-50 flex flex-col">
        {{-- Admin Header --}}
        <div class="bg-emerald-950 text-white px-4 py-3 flex items-center justify-between gap-4 flex-shrink-0">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="p-2 rounded-lg hover:bg-emerald-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </a>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-emerald-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0v3.75" />
                    </svg>
                    <div>
                        <p class="font-bold text-sm leading-tight">Panel Manajemen Konten</p>
                        <p class="text-emerald-400 text-xs">F-09 — Data Gerakan Sholat & Identitas</p>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="hidden sm:flex items-center gap-1.5 bg-emerald-900/60 rounded-lg px-3 py-1.5 text-xs text-emerald-300">
                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-400"></div>
                    SQLite DB
                </div>
                <button
                    id="reset_btn"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold transition-all bg-emerald-800 text-emerald-200 hover:bg-emerald-700 cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Reset ke Default
                </button>
            </div>
        </div>

        {{-- Tab Bar --}}
        <div class="bg-white border-b border-gray-200 px-4 flex gap-4">
            <button id="tab_movements" class="py-3 text-sm font-semibold border-b-2 border-emerald-600 text-emerald-600 transition-colors cursor-pointer">
                Gerakan Sholat ({{ count($movements) }})
            </button>
            <button id="tab_meta" class="py-3 text-sm font-semibold border-b-2 border-transparent text-gray-500 hover:text-gray-800 transition-colors cursor-pointer">
                Identitas Aplikasi
            </button>
        </div>

        {{-- Main Area --}}
        <div class="flex-1 flex overflow-hidden relative">
            
            {{-- Tab 1: Movements Editor --}}
            <div id="content_movements" class="flex-1 flex overflow-hidden">
                {{-- Sidebar: movement list --}}
                <div class="w-52 sm:w-64 bg-white border-r border-gray-200 flex-shrink-0 overflow-y-auto">
                    <div class="px-3 py-3 border-b border-gray-100 bg-gray-50">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wide">Daftar Gerakan</p>
                    </div>
                    
                    <div id="sidebar_list">
                        @foreach ($movements as $m)
                            @php
                                $c = $accentColors[($m->urutan - 1) % count($accentColors)];
                            @endphp
                            <button 
                                type="button" 
                                onclick="selectMovement({{ $m->urutan }})" 
                                id="sidebar_btn_{{ $m->urutan }}"
                                class="w-full flex items-center gap-2.5 px-3 py-2.5 text-left transition-colors border-b border-gray-100 hover:bg-gray-50 cursor-pointer"
                            >
                                <div class="w-7 h-7 rounded-lg flex items-center justify-center text-white text-xs font-bold flex-shrink-0"
                                     style="background-color: {{ $c }}">
                                    {{ $m->urutan }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-xs font-semibold text-slate-800 truncate">{{ $m->name }}</p>
                                    <p class="text-[10px] text-gray-400 truncate">{{ $m->subtitle }}</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3 text-emerald-600 hidden select-indicator" id="sidebar_indicator_{{ $m->urutan }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Form Editor --}}
                <div class="flex-1 overflow-y-auto p-4 sm:p-6 bg-white">
                    <form id="movement_form" class="max-w-2xl">
                        @csrf
                        <input type="hidden" id="edit_urutan" name="urutan">
                        
                        <div class="flex items-center justify-between gap-4 mb-6 pb-4 border-b border-gray-100">
                            <div>
                                <h2 class="font-bold text-slate-900 text-lg" id="form_title">Pilih Gerakan...</h2>
                                <p class="text-xs text-gray-400 mt-0.5" id="form_draft_status">Tidak ada perubahan</p>
                            </div>
                            <button 
                                type="submit" 
                                id="save_gerakan_btn"
                                class="flex items-center gap-2 px-5 py-2 bg-emerald-600 text-white rounded-lg font-semibold text-sm hover:bg-emerald-700 disabled:opacity-40 transition-all flex-shrink-0 shadow-sm cursor-pointer"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <span>Simpan</span>
                            </button>
                        </div>

                        <div id="form_fields" class="space-y-4 hidden">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Nama Gerakan</label>
                                <input type="text" id="edit_name" name="name" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Subjudul</label>
                                <input type="text" id="edit_subtitle" name="subtitle" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Emoji / Icon Gerakan</label>
                                <input type="text" id="edit_emoji" name="emoji" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Teks Arab</label>
                                <textarea id="edit_arabic" name="arabic" rows="3" dir="rtl" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xl focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white font-arabic leading-relaxed"></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Transliterasi</label>
                                <textarea id="edit_transliteration" name="transliteration" rows="2" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white italic"></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Terjemahan</label>
                                <textarea id="edit_translation" name="translation" rows="2" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white"></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Deskripsi (Dewasa)</label>
                                <textarea id="edit_description" name="description" rows="3" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white"></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Deskripsi (Anak-anak)</label>
                                <textarea id="edit_kidsDesc" name="kidsDesc" rows="3" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white"></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">URL Audio MP3</label>
                                <input type="text" id="edit_audioUrl" name="audioUrl" placeholder="https://..." class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">URL Video</label>
                                <input type="text" id="edit_videoUrl" name="videoUrl" placeholder="https://..." class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                            </div>
                        </div>

                        <div id="form_placeholder" class="text-center py-20 text-gray-400 text-sm">
                            Silakan pilih gerakan sholat dari daftar di sebelah kiri untuk mengedit.
                        </div>
                    </form>
                </div>
            </div>

            {{-- Tab 2: Meta Editor (hidden by default) --}}
            <div id="content_meta" class="flex-1 p-4 sm:p-6 bg-white hidden">
                <div class="max-w-xl">
                    <p class="text-sm text-gray-400 mb-5">
                        Ubah informasi identitas kelompok dan program studi yang ditampilkan di bagian atas header halaman.
                    </p>
                    
                    <form id="meta_form" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Nama Kelompok</label>
                            <input type="text" name="group" value="{{ $meta->nama_kelompok }}" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Program Studi</label>
                            <input type="text" name="program" value="{{ $meta->prodi }}" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Mata Kuliah</label>
                            <input type="text" name="course" value="{{ $meta->mata_kuliah }}" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1.5 uppercase tracking-wide">Nama Dosen</label>
                            <input type="text" name="lecturer" value="{{ $meta->dosen }}" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/40 bg-white">
                        </div>

                        <button 
                            type="submit" 
                            id="save_meta_btn"
                            class="flex items-center gap-2 px-5 py-2.5 bg-emerald-600 text-white rounded-lg font-semibold text-sm hover:bg-emerald-700 disabled:opacity-40 transition-all cursor-pointer shadow-sm"
                        >
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    {{-- Admin Panel Tab Switching & Form Sync Scripts --}}
    <script>
        // Load all movements from backend
        const movementsList = @json($movements);
        
        let selectedUrutan = null;
        let originalSelectedData = null;

        document.addEventListener('DOMContentLoaded', () => {
            const tabMovements = document.getElementById('tab_movements');
            const tabMeta = document.getElementById('tab_meta');
            const contentMovements = document.getElementById('content_movements');
            const contentMeta = document.getElementById('content_meta');

            // Tabs toggling
            tabMovements.addEventListener('click', () => {
                tabMovements.className = "py-3 text-sm font-semibold border-b-2 border-emerald-600 text-emerald-600 transition-colors cursor-pointer";
                tabMeta.className = "py-3 text-sm font-semibold border-b-2 border-transparent text-gray-500 hover:text-gray-800 transition-colors cursor-pointer";
                contentMovements.classList.remove('hidden');
                contentMeta.classList.add('hidden');
            });

            tabMeta.addEventListener('click', () => {
                tabMeta.className = "py-3 text-sm font-semibold border-b-2 border-emerald-600 text-emerald-600 transition-colors cursor-pointer";
                tabMovements.className = "py-3 text-sm font-semibold border-b-2 border-transparent text-gray-500 hover:text-gray-800 transition-colors cursor-pointer";
                contentMeta.classList.remove('hidden');
                contentMovements.classList.add('hidden');
            });

            // Reset database action
            const resetBtn = document.getElementById('reset_btn');
            resetBtn.addEventListener('click', () => {
                if (!confirm('Apakah Anda yakin ingin mereset seluruh database ke default? Semua perubahan edit Anda akan hilang.')) return;
                
                resetBtn.disabled = true;
                resetBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-1.5 h-3.5 w-3.5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg> Mereset...`;

                fetch("{{ route('admin.reset') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        window.location.reload();
                    } else {
                        alert('Gagal mereset: ' + data.message);
                        resetBtn.disabled = false;
                        resetBtn.innerHTML = 'Reset ke Default';
                    }
                })
                .catch(err => {
                    alert('Error resetting database: ' + err);
                    resetBtn.disabled = false;
                    resetBtn.innerHTML = 'Reset ke Default';
                });
            });

            // Submit Metadata change Form
            const metaForm = document.getElementById('meta_form');
            const saveMetaBtn = document.getElementById('save_meta_btn');
            metaForm.addEventListener('submit', (e) => {
                e.preventDefault();
                saveMetaBtn.disabled = true;
                saveMetaBtn.innerHTML = 'Menyimpan...';

                const formData = new FormData(metaForm);
                const payload = {};
                formData.forEach((val, key) => payload[key] = val);

                fetch("{{ route('admin.meta.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        saveMetaBtn.innerHTML = '✓ Tersimpan!';
                        setTimeout(() => {
                            saveMetaBtn.disabled = false;
                            saveMetaBtn.innerHTML = 'Simpan Perubahan';
                        }, 2000);
                    } else {
                        alert('Gagal memperbarui metadata: ' + data.message);
                        saveMetaBtn.disabled = false;
                        saveMetaBtn.innerHTML = 'Simpan Perubahan';
                    }
                })
                .catch(err => {
                    alert('Error: ' + err);
                    saveMetaBtn.disabled = false;
                    saveMetaBtn.innerHTML = 'Simpan Perubahan';
                });
            });

            // Submit Movement edit form
            const mForm = document.getElementById('movement_form');
            const saveGerakanBtn = document.getElementById('save_gerakan_btn');
            mForm.addEventListener('submit', (e) => {
                e.preventDefault();
                saveGerakanBtn.disabled = true;
                saveGerakanBtn.innerHTML = 'Menyimpan...';

                const formData = new FormData(mForm);
                const payload = {};
                formData.forEach((val, key) => payload[key] = val);

                fetch("{{ route('admin.gerakan.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        saveGerakanBtn.innerHTML = '✓ Tersimpan!';
                        
                        // Update local object array
                        const updatedIndex = movementsList.findIndex(m => m.urutan === parseInt(payload.urutan));
                        if (updatedIndex !== -1) {
                            movementsList[updatedIndex] = {
                                urutan: parseInt(payload.urutan),
                                name: payload.name,
                                subtitle: payload.subtitle,
                                emoji: payload.emoji,
                                arabic: payload.arabic,
                                transliteration: payload.transliteration,
                                translation: payload.translation,
                                description: payload.description,
                                kidsDesc: payload.kidsDesc,
                                audioUrl: payload.audioUrl,
                                videoUrl: payload.videoUrl
                            };
                            
                            // Update sidebar labels
                            const btn = document.getElementById(`sidebar_btn_${payload.urutan}`);
                            btn.querySelector('p.font-semibold').textContent = payload.name;
                            btn.querySelector('p.text-gray-400').textContent = payload.subtitle;
                        }

                        // Reset modified draft notifications
                        originalSelectedData = JSON.parse(JSON.stringify(payload));
                        checkDraftModified();

                        setTimeout(() => {
                            saveGerakanBtn.disabled = false;
                            saveGerakanBtn.innerHTML = 'Simpan';
                        }, 2000);
                    } else {
                        alert('Gagal menyimpan gerakan: ' + data.message);
                        saveGerakanBtn.disabled = false;
                        saveGerakanBtn.innerHTML = 'Simpan';
                    }
                })
                .catch(err => {
                    alert('Error: ' + err);
                    saveGerakanBtn.disabled = false;
                    saveGerakanBtn.innerHTML = 'Simpan';
                });
            });

            // Setup input change event listeners to identify draft/modified status
            const inputs = mForm.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', checkDraftModified);
            });
        });

        // Sidebar click selection
        function selectMovement(urutan) {
            selectedUrutan = urutan;
            const m = movementsList.find(x => x.urutan === urutan);
            if (!m) return;

            // Update sidebar buttons selection styling
            const sidebarBtns = document.querySelectorAll('#sidebar_list button');
            sidebarBtns.forEach(btn => {
                btn.style.backgroundColor = "";
                btn.style.borderLeft = "";
            });
            const activeIndicator = document.querySelectorAll('.select-indicator');
            activeIndicator.forEach(ind => ind.classList.add('hidden'));

            const activeBtn = document.getElementById(`sidebar_btn_${urutan}`);
            const accentColor = activeBtn.querySelector('div').style.backgroundColor;
            activeBtn.style.backgroundColor = `${accentColor}12`;
            activeBtn.style.borderLeft = `3px solid ${accentColor}`;
            document.getElementById(`sidebar_indicator_${urutan}`).classList.remove('hidden');

            // Show Form Fields
            document.getElementById('form_fields').classList.remove('hidden');
            document.getElementById('form_placeholder').classList.add('hidden');

            // Fill Form values
            document.getElementById('edit_urutan').value = m.urutan;
            document.getElementById('edit_name').value = m.name;
            document.getElementById('edit_subtitle').value = m.subtitle;
            document.getElementById('edit_emoji').value = m.emoji;
            document.getElementById('edit_arabic').value = m.arabic;
            document.getElementById('edit_transliteration').value = m.transliteration;
            document.getElementById('edit_translation').value = m.translation;
            document.getElementById('edit_description').value = m.description;
            document.getElementById('edit_kidsDesc').value = m.kidsDesc;
            document.getElementById('edit_audioUrl').value = m.audioUrl || '';
            document.getElementById('edit_videoUrl').value = m.videoUrl || '';

            document.getElementById('form_title').textContent = `Gerakan ${m.urutan}: ${m.name}`;

            // Save copy of original details to track changes
            originalSelectedData = {
                urutan: String(m.urutan),
                name: m.name,
                subtitle: m.subtitle || '',
                emoji: m.emoji || '',
                arabic: m.arabic || '',
                transliteration: m.transliteration || '',
                translation: m.translation || '',
                description: m.description || '',
                kidsDesc: m.kidsDesc || '',
                audioUrl: m.audioUrl || '',
                videoUrl: m.videoUrl || ''
            };

            checkDraftModified();
        }

        // Compare current form values with original values
        function checkDraftModified() {
            if (!originalSelectedData) return;

            const current = {
                urutan: document.getElementById('edit_urutan').value,
                name: document.getElementById('edit_name').value,
                subtitle: document.getElementById('edit_subtitle').value,
                emoji: document.getElementById('edit_emoji').value,
                arabic: document.getElementById('edit_arabic').value,
                transliteration: document.getElementById('edit_transliteration').value,
                translation: document.getElementById('edit_translation').value,
                description: document.getElementById('edit_description').value,
                kidsDesc: document.getElementById('edit_kidsDesc').value,
                audioUrl: document.getElementById('edit_audioUrl').value,
                videoUrl: document.getElementById('edit_videoUrl').value
            };

            let changedCount = 0;
            for (const key in originalSelectedData) {
                if (originalSelectedData[key] !== current[key]) {
                    changedCount++;
                }
            }

            const statusText = document.getElementById('form_draft_status');
            if (changedCount > 0) {
                statusText.innerHTML = `<span class="text-amber-600 font-semibold">• ${changedCount} field diubah (belum disimpan)</span>`;
            } else {
                statusText.textContent = "Tidak ada perubahan";
            }
        }
    </script>
@endsection
