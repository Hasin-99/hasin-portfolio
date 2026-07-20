@extends('layouts.app')

@section('title', $project->title . ' - Md. Shadman Hasin')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($project->description), 155))

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/works.css') }}">
@endpush

@section('content')
    @php
        $tags = is_array($project->tech_tags)
            ? $project->tech_tags
            : array_filter(array_map('trim', explode(',', (string) $project->tech_tags)));
        $imageUrl = null;
        if ($project->image) {
            $imageUrl = str_starts_with($project->image, 'http')
                ? $project->image
                : (str_starts_with($project->image, 'storage/') || str_starts_with($project->image, 'assets/')
                    ? asset($project->image)
                    : asset('storage/' . $project->image));
        }
    @endphp

    <article>
        <header class="detail-hero">
            <a href="{{ route('works') }}" class="detail-back">← All Work</a>
            <p class="detail-cat reveal">{{ $project->category ?? 'Project' }}</p>
            <h1 class="reveal">{{ $project->title }}</h1>
            <p class="lead reveal">{{ \Illuminate\Support\Str::limit($project->description, 220) }}</p>
            <div class="detail-actions reveal">
                @if($project->project_url)
                    <a href="{{ $project->project_url }}" class="btn btn-primary magnetic" target="_blank" rel="noopener" data-cursor="GitHub">View Repository</a>
                @endif
                <a href="{{ route('contact') }}" class="btn btn-ghost magnetic" data-cursor="Talk">Discuss a Similar Build</a>
            </div>
        </header>

        <div class="detail-body">
            <div class="detail-visual reveal">
                @if($imageUrl)
                    <img src="{{ $imageUrl }}" alt="{{ $project->title }}">
                @else
                    <div class="detail-visual-fallback">{{ $project->category ?? 'HASIN' }}</div>
                @endif
            </div>

            @if(count($tags))
                <section class="detail-panel reveal">
                    <h2>Stack</h2>
                    <div class="detail-tags">
                        @foreach($tags as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </section>
            @endif

            <section class="detail-panel reveal">
                <h2>Overview</h2>
                <p class="detail-body-copy">{{ $project->description }}</p>
            </section>

            @if($project->project_url)
                <section class="detail-panel reveal">
                    <h2>Repository</h2>
                    <p class="detail-body-copy"><a href="{{ $project->project_url }}" target="_blank" rel="noopener">{{ $project->project_url }}</a></p>
                </section>
            @endif

            @if(!empty($prev) || !empty($next))
                <nav class="detail-nav reveal" aria-label="Adjacent projects">
                    @if(!empty($prev))
                        <a href="{{ route('works.show', $prev) }}" class="detail-nav-link">
                            <span class="detail-nav-label">Previous</span>
                            <span class="detail-nav-title">{{ $prev->title }}</span>
                        </a>
                    @else
                        <span></span>
                    @endif
                    @if(!empty($next))
                        <a href="{{ route('works.show', $next) }}" class="detail-nav-link detail-nav-link--next">
                            <span class="detail-nav-label">Next</span>
                            <span class="detail-nav-title">{{ $next->title }}</span>
                        </a>
                    @endif
                </nav>
            @endif
        </div>
    </article>
@endsection
