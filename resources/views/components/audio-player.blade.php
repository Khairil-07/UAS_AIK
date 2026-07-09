@props(['isKids' => false, 'color', 'audioUrl' => ''])

@php
    $hasRealAudio = !empty($audioUrl);
    $playerId = 'audio_player_' . rand(1000, 9999);
@endphp

<div id="{{ $playerId }}" class="w-full">
    @if ($hasRealAudio)
        <audio id="{{ $playerId }}_audio" src="{{ $audioUrl }}" preload="metadata"></audio>
    @endif

    @if ($isKids)
        {{-- Kids Mode Audio Player --}}
        <div class="flex flex-col items-center gap-3">
            <button
                type="button"
                id="{{ $playerId }}_play_btn"
                class="w-20 h-20 rounded-full flex items-center justify-center text-white shadow-lg active:scale-95 transition-transform cursor-pointer"
                style="background-color: {{ $color }};"
                aria-label="Play/Pause"
            >
                <!-- Play Icon -->
                <svg id="{{ $playerId }}_play_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-9 h-9 ml-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347c-.75.412-1.667-.13-1.667-.986V5.653Z" />
                </svg>
                <!-- Pause Icon (hidden by default) -->
                <svg id="{{ $playerId }}_pause_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-9 h-9 hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                </svg>
            </button>

            @if (!$hasRealAudio)
                <span class="text-xs text-gray-400 italic" style="font-family: 'Nunito', sans-serif;">
                    (File audio belum tersedia - disimulasikan)
                </span>
            @endif

            <div id="{{ $playerId }}_status_text" class="text-xs font-bold flex items-center gap-1.5" style="color: {{ $color }}; font-family: 'Nunito', sans-serif;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 0v1.5a3 3 0 01-3 3h-7.5a3 3 0 01-3-3V5.25m3 3H15m-6-3h.008v.008H9V5.25" />
                </svg>
                <span>Dengarkan Bacaan!</span>
            </div>

            <div class="w-full max-w-xs">
                <div id="{{ $playerId }}_progress_bar" class="h-3 bg-gray-200 rounded-full overflow-hidden cursor-pointer relative">
                    <div id="{{ $playerId }}_progress_fill" class="h-full rounded-full transition-all duration-75" style="width: 0%; background-color: {{ $color }};"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mt-1" style="font-family: 'Nunito', sans-serif;">
                    <span id="{{ $playerId }}_current_time">0:00</span>
                    <span id="{{ $playerId }}_total_time">0:42</span>
                </div>
            </div>
        </div>
    @else
        {{-- Adult Mode Audio Player --}}
        <div class="bg-gray-50 border border-emerald-100/40 rounded-xl p-3.5">
            @if (!$hasRealAudio)
                <p class="text-xs text-amber-600 flex items-center gap-1 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    File audio belum dikonfigurasi - audio disimulasikan.
                </p>
            @endif
            <div class="flex items-center gap-3">
                <button
                    type="button"
                    id="{{ $playerId }}_play_btn"
                    class="w-9 h-9 rounded-full flex items-center justify-center text-white flex-shrink-0 active:scale-95 shadow-sm cursor-pointer"
                    style="background-color: {{ $color }};"
                    aria-label="Play/Pause"
                >
                    <!-- Play Icon -->
                    <svg id="{{ $playerId }}_play_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 ml-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347c-.75.412-1.667-.13-1.667-.986V5.653Z" />
                    </svg>
                    <!-- Pause Icon (hidden by default) -->
                    <svg id="{{ $playerId }}_pause_icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                    </svg>
                </button>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between text-xs text-muted-foreground mb-1.5">
                        <span class="flex items-center gap-1 font-medium text-emerald-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                            </svg>
                            Audio Bacaan
                        </span>
                        <span class="font-mono" id="{{ $playerId }}_time_display">0:00 / 0:42</span>
                    </div>
                    <div id="{{ $playerId }}_progress_bar" class="h-1.5 bg-gray-200 rounded-full overflow-hidden cursor-pointer">
                        <div id="{{ $playerId }}_progress_fill" class="h-full rounded-full transition-all duration-75" style="width: 0%; background-color: {{ $color }};"></div>
                    </div>
                </div>
                <div class="flex items-center gap-px h-5 flex-shrink-0" id="{{ $playerId }}_wave_bars">
                    @foreach ([2,4,6,3,5,4,2,5,3,6] as $h)
                        <div class="w-1 rounded-full transition-all duration-300 wave-bar" style="height: {{ $h * 2 }}px; background-color: #d1d5db;" data-height="{{ $h }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const playerId = "{{ $playerId }}";
            const isKids = {{ $isKids ? 'true' : 'false' }};
            const hasRealAudio = {{ $hasRealAudio ? 'true' : 'false' }};
            
            const playBtn = document.getElementById(`${playerId}_play_btn`);
            const playIcon = document.getElementById(`${playerId}_play_icon`);
            const pauseIcon = document.getElementById(`${playerId}_pause_icon`);
            const progressBar = document.getElementById(`${playerId}_progress_bar`);
            const progressFill = document.getElementById(`${playerId}_progress_fill`);
            
            let audioEl = null;
            let playing = false;
            let progress = 0;
            let duration = 42; // default simulated duration in seconds
            let timerId = null;

            if (hasRealAudio) {
                audioEl = document.getElementById(`${playerId}_audio`);
                audioEl.addEventListener('loadedmetadata', () => {
                    duration = audioEl.duration;
                    updateUI();
                });
                audioEl.addEventListener('timeupdate', () => {
                    progress = (audioEl.currentTime / audioEl.duration) * 100;
                    updateUI();
                });
                audioEl.addEventListener('ended', () => {
                    playing = false;
                    progress = 0;
                    if (audioEl) audioEl.currentTime = 0;
                    updateUI();
                });
            }

            function updateUI() {
                progressFill.style.width = `${progress}%`;

                let currentSecs = 0;
                if (hasRealAudio && audioEl) {
                    currentSecs = audioEl.currentTime;
                } else {
                    currentSecs = (progress / 100) * duration;
                }

                const fmtTime = (s) => {
                    const m = Math.floor(s / 60);
                    const sec = Math.floor(s % 60);
                    return `${m}:${sec.toString().padStart(2, '0')}`;
                };

                if (isKids) {
                    const statusText = document.getElementById(`${playerId}_status_text`).querySelector('span');
                    statusText.textContent = playing ? "Sedang Diputar... 🎵" : "Dengarkan Bacaan!";
                    document.getElementById(`${playerId}_current_time`).textContent = fmtTime(currentSecs);
                    document.getElementById(`${playerId}_total_time`).textContent = fmtTime(duration);
                } else {
                    document.getElementById(`${playerId}_time_display`).textContent = `${fmtTime(currentSecs)} / ${fmtTime(duration)}`;
                    
                    // Wave bars animation
                    const waveBars = document.querySelectorAll(`#${playerId}_wave_bars .wave-bar`);
                    waveBars.forEach((bar) => {
                        const h = parseFloat(bar.getAttribute('data-height'));
                        if (playing) {
                            // randomize height slightly for dynamic look
                            const randomMultiplier = 0.5 + Math.random() * 0.7;
                            bar.style.height = `${h * 3.5 * randomMultiplier}px`;
                            bar.style.backgroundColor = "{{ $color }}";
                        } else {
                            bar.style.height = `${h * 2}px`;
                            bar.style.backgroundColor = "#d1d5db";
                        }
                    });
                }

                if (playing) {
                    playIcon.classList.add('hidden');
                    pauseIcon.classList.remove('hidden');
                } else {
                    playIcon.classList.remove('hidden');
                    pauseIcon.classList.add('hidden');
                }
            }

            function playSimulated() {
                if (timerId) clearInterval(timerId);
                
                timerId = setInterval(() => {
                    progress += 100 / (duration * 20); // updates every 50ms
                    if (progress >= 100) {
                        progress = 0;
                        playing = false;
                        clearInterval(timerId);
                    }
                    updateUI();
                }, 50);
            }

            function pauseSimulated() {
                if (timerId) clearInterval(timerId);
            }

            function togglePlay() {
                playing = !playing;
                if (hasRealAudio && audioEl) {
                    if (playing) {
                        audioEl.play().catch(e => console.log("Audio play blocked/failed: ", e));
                    } else {
                        audioEl.pause();
                    }
                } else {
                    if (playing) {
                        playSimulated();
                    } else {
                        pauseSimulated();
                    }
                }
                updateUI();
            }

            playBtn.addEventListener('click', togglePlay);

            progressBar.addEventListener('click', (e) => {
                const rect = progressBar.getBoundingClientRect();
                const clickX = e.clientX - rect.left;
                const width = rect.width;
                const newProgress = (clickX / width) * 100;
                
                progress = newProgress;
                if (hasRealAudio && audioEl) {
                    audioEl.currentTime = (newProgress / 100) * audioEl.duration;
                } else {
                    if (playing) {
                        playSimulated();
                    }
                }
                updateUI();
            });

            // Initialize total duration UI
            updateUI();
        });
    </script>
</div>
