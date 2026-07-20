{{-- HASIN special mark: geometric H + rising signal --}}
@php($gradId = 'hasinSignalGrad-' . ($markId ?? uniqid()))
<svg class="hasin-mark-svg" viewBox="0 0 80 80" fill="none" aria-hidden="true">
    <defs>
        <linearGradient id="{{ $gradId }}" x1="40" y1="12" x2="40" y2="68" gradientUnits="userSpaceOnUse">
            <stop offset="0%" stop-color="var(--signal)"/>
            <stop offset="100%" stop-color="var(--signal-soft)"/>
        </linearGradient>
    </defs>
    <circle class="hasin-ring" cx="40" cy="40" r="36" stroke="currentColor" stroke-width="1.25" opacity="0.16"/>
    <circle class="hasin-orbit" cx="40" cy="40" r="30" stroke="var(--signal)" stroke-width="1.5" stroke-dasharray="6 8" opacity="0.55"/>
    <path class="hasin-pillar hasin-pillar--l" d="M22 16v48" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
    <path class="hasin-pillar hasin-pillar--r" d="M58 16v48" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
    <path class="hasin-bridge" d="M22 40h36" stroke="currentColor" stroke-width="9" stroke-linecap="round"/>
    <path class="hasin-rise" d="M28 58c4-18 20-28 24-34" stroke="url(#{{ $gradId }})" stroke-width="2.5" stroke-linecap="round" fill="none"/>
    <circle class="hasin-core" cx="40" cy="40" r="7" fill="url(#{{ $gradId }})"/>
    <circle class="hasin-core-inner" cx="40" cy="40" r="3" fill="var(--bg)"/>
    <circle class="hasin-spark" cx="52" cy="24" r="3.25" fill="var(--signal)"/>
</svg>
