@props(['meta', 'showAdminLink' => false])
<div class="bg-emerald-950 text-emerald-200 px-4 py-2.5 shadow-sm">
  <div class="max-w-4xl mx-auto flex items-center justify-between gap-3">
    <div class="flex flex-wrap items-center gap-x-3 gap-y-0.5 text-xs min-w-0">
      <span class="font-bold text-white">{{ $meta->nama_kelompok }}</span>
      <span class="opacity-40 hidden sm:inline">·</span>
      <span class="hidden sm:inline truncate">{{ $meta->prodi }}</span>
      <span class="opacity-40 hidden md:inline">·</span>
      <span class="hidden md:inline">{{ $meta->mata_kuliah }}</span>
      <span class="opacity-40 hidden lg:inline">·</span>
      <span class="hidden lg:inline text-emerald-300">Dosen: {{ $meta->dosen }}</span>
    </div>
    @if($showAdminLink)
      <a
        href="{{ route('admin') }}"
        class="flex-shrink-0 p-1.5 rounded-lg hover:bg-emerald-800 transition-colors text-emerald-400 hover:text-emerald-200"
        title="Panel Admin"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings w-3.5 h-3.5">
          <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.1a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/>
          <circle cx="12" cy="12" r="3"/>
        </svg>
      </a>
    @endif
  </div>
</div>
