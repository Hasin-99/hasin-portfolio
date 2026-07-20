@extends('layouts.app')

@section('title', 'Work - Md. Shadman Hasin')
@section('meta_description', 'Projects by Md. Shadman Hasin: StudentMove, PayKotha, CodeKotha, CKD AI, security, IoT, graphics. Filter and search live.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/works.css') }}">
@endpush

@section('content')
    @php
        $categories = $projects->pluck('category')->filter()->unique()->values();
    @endphp

    <header class="works-hero">
        <p class="section-label reveal">Portfolio</p>
        <h1 class="reveal">Projects I shipped. Filter and search update live.</h1>
        <p class="reveal">StudentMove, PayKotha, CodeKotha, clinical ML, security, IoT, and graphics. Type a keyword or tap a category and the list updates as you go.</p>
    </header>

    <div class="works-toolbar reveal">
        <label class="works-search">
            <span class="sr-only">Search projects</span>
            <input type="search" class="works-search-input" placeholder="Search projects, stack, keywords…" autocomplete="off" enterkeyhint="search">
        </label>
        <p class="works-live-count" aria-live="polite">{{ $projects->count() }} projects</p>
    </div>

    @if($categories->isNotEmpty())
        <div class="filter-bar reveal" role="tablist" aria-label="Filter projects by category">
            <button type="button" class="filter-btn is-active" data-filter="all" aria-selected="true">All</button>
            @foreach($categories as $category)
                <button type="button" class="filter-btn" data-filter="{{ $category }}" aria-selected="false">{{ $category }}</button>
            @endforeach
        </div>
    @endif

    <div class="works-list" data-stagger>
        @forelse($projects as $index => $project)
            @php
                $tags = is_array($project->tech_tags)
                    ? $project->tech_tags
                    : array_filter(array_map('trim', explode(',', (string) $project->tech_tags)));
            @endphp
            <a href="{{ route('works.show', $project) }}"
               class="project-row reveal"
               data-category="{{ $project->category }}"
               data-cursor="Open">
                <span class="project-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                <div class="project-main">
                    <h2>{{ $project->title }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit($project->description, 160) }}</p>
                </div>
                <div class="project-tags">
                    @foreach(array_slice($tags, 0, 5) as $tag)
                        <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>
                <div class="project-meta">
                    <div class="project-cat">{{ $project->category ?? 'Project' }}</div>
                    <span class="project-link-arrow" aria-hidden="true">→</span>
                </div>
            </a>
        @empty
            <p class="reveal">No projects yet. Run <code>php artisan db:seed</code>.</p>
        @endforelse
    </div>

    <p class="works-empty" hidden>No projects match that filter or search. Try “All” or clear the search.</p>
@endsection

@push('scripts')
    <script src="{{ asset('js/works.js') }}"></script>
@endpush
