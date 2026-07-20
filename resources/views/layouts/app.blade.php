<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#071416">
    <meta name="color-scheme" content="dark">
    <meta name="description" content="@yield('meta_description', 'Md. Shadman Hasin - Software Developer and CSE graduate building web, mobile, and machine learning projects.')">
    <meta name="author" content="Md. Shadman Hasin">
    <meta property="og:title" content="@yield('title', 'Md. Shadman Hasin - Portfolio')">
    <meta property="og:description" content="@yield('meta_description', 'Software Developer and CSE graduate building systems across web, mobile, and machine learning.')">
    <meta property="og:type" content="website">
    <title>@yield('title', 'Md. Shadman Hasin - Portfolio')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    @php
        $layoutSettings = $layoutSettings ?? [];
        $resume = $layoutSettings['resume_file'] ?? 'assets/Md._Shadman_Hasin_CV.pdf';
        $resumeUrl = str_starts_with($resume, 'http')
            ? $resume
            : (str_starts_with($resume, 'storage/') || str_starts_with($resume, 'assets/')
                ? asset($resume)
                : asset('storage/' . $resume));
        $socialDefaults = [
            'github_url' => 'https://github.com/Hasin-99',
            'linkedin_url' => 'https://www.linkedin.com/in/md-shadman-hasin-648587333',
            'facebook_url' => 'https://www.facebook.com/share/1DXDNhmRdW/',
            'instagram_url' => 'https://www.instagram.com/shadman_hasin_99/',
            'twitter_url' => 'https://x.com/shadman_hasin99',
            'threads_url' => 'https://www.threads.com/@shadman_hasin_99',
            'telegram_url' => 'https://t.me/Hasin_999',
            'whatsapp_url' => 'https://wa.me/8801764851551',
            'contact_email' => 'md.shadmanhasin520k82@gmail.com',
            'contact_phone' => '+880 1764-851551 · +880 1719-639794',
        ];
        $footerSocials = array_merge($socialDefaults, array_filter($layoutSettings, fn ($v) => filled($v)));
    @endphp

    <div class="preloader" aria-hidden="true">
        <div class="preloader-inner">
            <div class="preloader-mark hasin-mark hasin-mark--special">
                @include('partials.hasin-mark', ['markId' => 'wipe'])
            </div>
            <div class="preloader-brand" aria-label="HASIN">
                <span>H</span><span>A</span><span>S</span><span>I</span><span>N</span>
            </div>
            <div class="preloader-bar"><span></span></div>
            <p class="preloader-tag">Hasin · Dhaka</p>
        </div>
    </div>

    <div class="scroll-progress" aria-hidden="true"><span></span></div>

    <header class="site-header">
        <a href="{{ route('home') }}" class="brand magnetic is-revealed" aria-label="HASIN home" data-cursor="HASIN">
            <span class="brand-lockup">
                <span class="hasin-mark hasin-mark--special" aria-hidden="true">
                    @include('partials.hasin-mark', ['markId' => 'nav'])
                </span>
                <span class="brand-word" aria-hidden="true">
                    <span class="brand-letter">H</span><span class="brand-letter">A</span><span class="brand-letter">S</span><span class="brand-letter">I</span><span class="brand-letter">N</span>
                </span>
            </span>
        </a>

        <button class="nav-toggle" type="button" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
        </button>

        <nav class="site-nav" aria-label="Primary">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" data-cursor="Enter">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" data-cursor="About">About</a></li>
                <li><a href="{{ route('works') }}" class="{{ request()->routeIs('works*') ? 'active' : '' }}" data-cursor="Work">Work</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}" data-cursor="Connect">Contact</a></li>
                <li class="nav-resume-item">
                    <a href="{{ $resumeUrl }}" class="resume-btn resume-btn--nav" target="_blank" rel="noopener" data-cursor="CV">Resume</a>
                </li>
            </ul>
        </nav>

        <div class="header-actions">
            <a href="{{ $resumeUrl }}" class="resume-btn magnetic" target="_blank" rel="noopener" data-cursor="CV">Resume</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div>
            <div class="footer-brand">
                <span class="hasin-mark hasin-mark--sm hasin-mark--special" aria-hidden="true">
                    @include('partials.hasin-mark', ['markId' => 'footer'])
                </span>
                <span>HASIN</span>
            </div>
            <p class="footer-note">StudentMove, PayKotha, CodeKotha, and clinical ML from Dhaka.</p>
        </div>
        <div class="footer-links">
            @include('partials.social-links', ['socialSettings' => $footerSocials])
            <a href="{{ route('contact') }}" data-cursor="Write">Contact</a>
        </div>
        <div class="footer-copy">&copy; {{ date('Y') }} Md. Shadman Hasin</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/animejs/dist/bundles/anime.umd.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/cursor.js') }}"></script>
    <script src="{{ asset('js/logo.js') }}"></script>
    @stack('scripts')
</body>
</html>
