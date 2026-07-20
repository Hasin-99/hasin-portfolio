@php
    $socials = [
        ['key' => 'github_url', 'label' => 'GitHub'],
        ['key' => 'linkedin_url', 'label' => 'LinkedIn'],
        ['key' => 'facebook_url', 'label' => 'Facebook'],
        ['key' => 'instagram_url', 'label' => 'Instagram'],
        ['key' => 'twitter_url', 'label' => 'X'],
        ['key' => 'threads_url', 'label' => 'Threads'],
        ['key' => 'telegram_url', 'label' => 'Telegram'],
        ['key' => 'whatsapp_url', 'label' => 'WhatsApp'],
    ];
    $source = $socialSettings ?? $settings ?? $layoutSettings ?? [];
@endphp
@foreach($socials as $social)
    @if(!empty($source[$social['key']]))
        <a href="{{ $source[$social['key']] }}" target="_blank" rel="noopener" data-cursor="{{ $social['label'] }}">{{ $social['label'] }}</a>
    @endif
@endforeach
@if(!empty($source['contact_email'] ?? $source['email'] ?? null))
    <a href="mailto:{{ $source['contact_email'] ?? $source['email'] }}" data-cursor="Email">Email</a>
@endif
@if(!empty($source['contact_phone'] ?? $source['phone'] ?? null))
    @php
        $rawPhone = $source['contact_phone'] ?? $source['phone'];
        $firstPhone = trim(preg_split('/\s*[·•|]\s*/u', $rawPhone)[0] ?? '');
        $telHref = preg_replace('/[^\d+]/', '', $firstPhone);
    @endphp
    @if($telHref !== '')
        <a href="tel:{{ $telHref }}" data-cursor="Phone">Phone</a>
    @endif
@endif
