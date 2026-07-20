@extends('layouts.app')

@section('title', 'Md. Shadman Hasin - Software Developer')
@section('meta_description', 'Md. Shadman Hasin from Dhaka. StudentMove, PayKotha, CodeKotha, CKD research, IoT, and security projects.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    @php
        $profileImage = $settings['profile_image'] ?? 'assets/images/profile.jpg';
        $profileUrl = str_starts_with($profileImage, 'http')
            ? $profileImage
            : (str_starts_with($profileImage, 'storage/') || str_starts_with($profileImage, 'assets/')
                ? asset($profileImage)
                : asset('storage/' . $profileImage));
        $name = $settings['name'] ?? 'Md. Shadman Hasin';
        $role = $settings['role'] ?? 'Software Developer and IT Professional';
        $bio = $settings['bio'] ?? 'CSE graduate from Daffodil International University. Thesis defended, certificate pending. I build StudentMove, PayKotha, CodeKotha, and clinical ML systems.';
        $projectList = isset($allProjects) && $allProjects->count() ? $allProjects : $featuredProjects;
    @endphp

    <section class="hero" aria-label="Introduction">
        <div class="hero-copy">
            <p class="hero-role">{{ $role }}</p>
            <h1 class="hero-brand" aria-label="HASIN">
                <span class="hero-brand-main">HASIN</span><span class="accent-dot" aria-hidden="true"></span>
            </h1>
            <p class="hero-name">{{ $name }}</p>
            <p class="hero-headline">Transit apps. Banking ledgers. Clinical models. A Bangla compiler.</p>
            <p class="hero-support">{{ $bio }}</p>
            <div class="hero-cta">
                <a href="{{ route('works') }}" class="btn btn-primary magnetic" data-cursor="Explore">See the work</a>
                <a href="{{ route('contact') }}" class="btn btn-ghost magnetic" data-cursor="Talk">Message me</a>
            </div>
        </div>

        <div class="hero-visual">
            <canvas id="signal-canvas" class="signal-canvas" aria-hidden="true"></canvas>
            <div class="hero-stage">
                <div class="hero-visual-plane"></div>
                <img src="{{ $profileUrl }}" alt="{{ $name }}" width="900" height="1200">
                <div class="hero-frame" aria-hidden="true"></div>
            </div>
            <div class="hero-visual-meta">
                <span>Dhaka, Bangladesh</span>
                <span class="meta-line"></span>
                <span>Looking for full-time</span>
            </div>
        </div>
    </section>

    <div class="signal-marquee" aria-hidden="true">
        <div class="signal-marquee-track">
            @foreach([1,2] as $loopCopy)
                <span>Portfolio</span><span class="sep">✦</span>
                <span>PayKotha</span><span class="sep">✦</span>
                <span>StudentMove Flutter</span><span class="sep">✦</span>
                <span>StudentMove Laravel</span><span class="sep">✦</span>
                <span>CodeKotha</span><span class="sep">✦</span>
                <span>CKD Multimodal</span><span class="sep">✦</span>
                <span>CICIDS2017</span><span class="sep">✦</span>
                <span>Retinal OCT</span><span class="sep">✦</span>
                <span>AgroCulture</span><span class="sep">✦</span>
                <span>Smart Cart IoT</span><span class="sep">✦</span>
                <span>OpenGL Maritime</span><span class="sep">✦</span>
                <span>Why So Serious Mail</span><span class="sep">✦</span>
            @endforeach
        </div>
    </div>

    <section class="stats-band reveal" aria-label="Highlights">
        <div class="stat-item">
            <span class="stat-number">{{ $settings['projects_count'] ?? '12+' }}</span>
            <span class="stat-label">Projects on GitHub</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $settings['experience_years'] ?? '2+' }}</span>
            <span class="stat-label">Years building</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">DIU</span>
            <span class="stat-label">CSE, thesis defended</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $settings['clients_count'] ?? '5+' }}</span>
            <span class="stat-label">Team projects</span>
        </div>
    </section>

    <section class="selected-work" aria-labelledby="selected-work-title">
        <div class="selected-work-header reveal">
            <div>
                <p class="section-label">Projects</p>
                <h2 class="section-title" id="selected-work-title">Built for problems, not just demos.</h2>
                <p class="section-lead">{{ $projectList->count() }} projects with Problem → Approach → Impact. Portfolio and PayKotha are individual builds; the rest are team work across transport, medical ML, IoT, and systems.</p>
            </div>
            <a href="{{ route('works') }}" class="btn btn-ghost magnetic" data-cursor="Archive">Open full list</a>
        </div>

        <div class="work-index" data-stagger>
            @forelse($projectList as $index => $project)
                <a href="{{ route('works.show', $project) }}"
                   class="work-row reveal"
                   data-cursor="Open"
                   data-preview="{{ $project->title }}"
                   data-category="{{ $project->category ?? 'Project' }}"
                   data-num="{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}">
                    <span class="work-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="work-main">
                        <span class="work-title">{{ $project->title }}</span>
                        <span class="work-excerpt">{{ \Illuminate\Support\Str::limit($project->problem ?: $project->description, 110) }}</span>
                    </div>
                    <span class="work-category">{{ $project->category ?? 'Project' }}</span>
                    <span class="work-arrow" aria-hidden="true">→</span>
                </a>
            @empty
                <p class="reveal">Run <code>php artisan db:seed</code> to load projects.</p>
            @endforelse
        </div>
    </section>

    <div class="work-preview" aria-hidden="true">
        <div class="work-preview-inner">
            <span class="work-preview-num"></span>
            <span class="work-preview-cat"></span>
            <span class="work-preview-title"></span>
        </div>
    </div>

    <section class="capabilities" aria-labelledby="cap-title">
        <div class="reveal">
            <p class="section-label">Capabilities</p>
            <h2 class="section-title" id="cap-title">Different tools for different problems.</h2>
            <p class="section-lead">Flutter for phones in someone’s hand. Laravel or FastAPI when the server must stay reliable. Python for clinical data. C++ when Bangla needs a real compiler.</p>
        </div>
        <div class="cap-grid" data-stagger>
            <article class="cap-item reveal">
                <span class="cap-index">01</span>
                <h3>Mobile and web</h3>
                <p>StudentMove on Flutter and Laravel. AgroCulture for farmers. Screens designed so people do not get lost.</p>
            </article>
            <article class="cap-item reveal">
                <span class="cap-index">02</span>
                <h3>Fintech and APIs</h3>
                <p>PayKotha with double-entry ledger, KYC tiers, OTP for larger amounts, and Redis rate limits.</p>
            </article>
            <article class="cap-item reveal">
                <span class="cap-index">03</span>
                <h3>ML and security</h3>
                <p>Thesis on CKD risk with explainable AI. Retinal OCT models. CICIDS2017 intrusion detection.</p>
            </article>
            <article class="cap-item reveal">
                <span class="cap-index">04</span>
                <h3>Systems and hardware</h3>
                <p>CodeKotha in C++ and Qt. OpenGL maritime day and night. ESP32 cart with RFID scanning.</p>
            </article>
        </div>
    </section>

    <section class="process-home reveal" aria-labelledby="process-title">
        <p class="section-label">How I work</p>
        <h2 class="section-title" id="process-title">Analyze, design, develop, deploy.</h2>
        <div class="process-grid" data-stagger>
            <article class="process-card reveal">
                <span class="process-num">01</span>
                <h3>Analyze</h3>
                <p>Requirements, constraints, datasets, and architecture before a feature ships.</p>
            </article>
            <article class="process-card reveal">
                <span class="process-num">02</span>
                <h3>Design</h3>
                <p>Wireframes, schemas, API contracts, and UX flows. Figma when the interface matters.</p>
            </article>
            <article class="process-card reveal">
                <span class="process-num">03</span>
                <h3>Develop</h3>
                <p>Frontend, backend, ML, or firmware. Version-controlled, modular, and testable.</p>
            </article>
            <article class="process-card reveal">
                <span class="process-num">04</span>
                <h3>Deploy</h3>
                <p>Harden, document, demo, and hand off, from lab prototypes to Docker stacks.</p>
            </article>
        </div>
    </section>

    <section class="connect-band reveal" aria-labelledby="connect-title">
        <div class="connect-orbit" aria-hidden="true"></div>
        <div class="connect-inner">
            <p class="section-label">Availability</p>
            <h2 id="connect-title">I am looking for a full-time software role in Dhaka.</h2>
            <p>Entry or mid-level is fine. Faridpur works if the team is right. I would rather show a repository than a slogan. StudentMove, PayKotha, CodeKotha, and the CKD thesis are all public.</p>
            <div class="hero-cta" style="opacity:1">
                <a href="{{ route('contact') }}" class="btn btn-primary magnetic" data-cursor="Connect">Say hello</a>
                <a href="{{ route('about') }}" class="btn btn-ghost magnetic" data-cursor="About" style="border-color:rgba(228,242,240,0.35);color:var(--ink)">More about me</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/scene3d.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
