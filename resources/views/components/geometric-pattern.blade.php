@props(['color', 'id'])
<div class="w-full h-full relative" style="background-color: {{ $color }}">
  <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <pattern id="{{ $id }}" x="0" y="0" width="80" height="80" patternUnits="userSpaceOnUse">
        <polygon points="40,6 49,30 74,30 54,46 62,70 40,56 18,70 26,46 6,30 31,30"
          fill="none" stroke="white" strokeWidth="1" opacity="0.25" />
        <circle cx="40" cy="40" r="6" fill="none" stroke="white" strokeWidth="0.8" opacity="0.2" />
        <line x1="0" y1="0" x2="80" y2="80" stroke="white" strokeWidth="0.4" opacity="0.1" />
        <line x1="80" y1="0" x2="0" y2="80" stroke="white" strokeWidth="0.4" opacity="0.1" />
        <circle cx="0" cy="0" r="3" fill="white" opacity="0.15" />
        <circle cx="80" cy="0" r="3" fill="white" opacity="0.15" />
        <circle cx="0" cy="80" r="3" fill="white" opacity="0.15" />
        <circle cx="80" cy="80" r="3" fill="white" opacity="0.15" />
      </pattern>
    </defs>
    <rect width="100%" height="100%" fill="url(#{{ $id }})" />
  </svg>
</div>
