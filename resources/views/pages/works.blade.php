@extends('layouts.app')

@section('title', 'Work - Md. Shadman Hasin')
@section('meta_description', 'Projects by Md. Shadman Hasin with Problem, Approach, and Impact: StudentMove, PayKotha, CodeKotha, CKD AI, security, IoT, and graphics.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/works.css') }}">
@endpush

@section('content')
    @php
        $categories = $projects->pluck('category')->filter()->unique()->values();
    @endphp

    <header class="works-hero">
        <p class="section-label reveal">Work</p>
        <h1 class="reveal">What broke, what I tried, what changed.</h1>
        <p class="reveal">Every project page starts with that story, then the stack. Search or filter for StudentMove, PayKotha, CodeKotha, clinical ML, security, IoT, and the rest.</p>
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
                    <p>{{ \Illuminate\Support\Str::limit($project->problem ?: $project->description, 160) }}</p>
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
