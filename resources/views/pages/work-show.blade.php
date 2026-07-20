@extends('layouts.app')

@section('title', $project->title . ' - Md. Shadman Hasin')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($project->problem ?: $project->description), 155))

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
        $liveUrl = null;
        if (preg_match('#https://[^\s]+#', (string) $project->description, $liveMatch)) {
            $candidate = rtrim($liveMatch[0], '.,;|)');
            if (! str_contains($candidate, 'github.com')) {
                $liveUrl = $candidate;
            }
        }
        $heroLead = $project->problem ?: $project->description;
        $hasThinking = filled($project->problem) || filled($project->approach) || filled($project->impact);
    @endphp

    <article>
        <header class="detail-hero">
            <a href="{{ route('works') }}" class="detail-back">← All Work</a>
            <p class="detail-cat reveal">{{ $project->category ?? 'Project' }}</p>
            <h1 class="reveal">{{ $project->title }}</h1>
            <p class="lead reveal">{{ \Illuminate\Support\Str::limit($heroLead, 240) }}</p>
            <div class="detail-actions reveal">
                @if($liveUrl)
                    <a href="{{ $liveUrl }}" class="btn btn-primary magnetic" target="_blank" rel="noopener" data-cursor="Live">View Live Site</a>
                @endif
                @if($project->project_url)
                    <a href="{{ $project->project_url }}" class="btn {{ $liveUrl ? 'btn-ghost' : 'btn-primary' }} magnetic" target="_blank" rel="noopener" data-cursor="GitHub">View Repository</a>
                @endif
                <a href="{{ route('contact') }}" class="btn btn-ghost magnetic" data-cursor="Talk">Discuss a Similar Build</a>
            </div>
        </header>

        <div class="detail-body">
            @if($hasThinking)
                <section class="detail-panel detail-panel--thinking reveal" aria-labelledby="thinking-title">
                    <h2 id="thinking-title">What I was solving</h2>
                    <div class="thinking-grid">
                        @if($project->problem)
                            <div class="thinking-block">
                                <h3>What was broken</h3>
                                <p>{{ $project->problem }}</p>
                            </div>
                        @endif
                        @if($project->approach)
                            <div class="thinking-block">
                                <h3>What I tried</h3>
                                <p>{{ $project->approach }}</p>
                            </div>
                        @endif
                        @if($project->impact)
                            <div class="thinking-block">
                                <h3>What changed</h3>
                                <p>{{ $project->impact }}</p>
                            </div>
                        @endif
                    </div>
                </section>
            @endif

            @if(count($tags))
                <section class="detail-panel reveal">
                    <h2>Stack</h2>
                    <p class="detail-stack-note">Tools used to solve the problem above.</p>
                    <div class="detail-tags">
                        @foreach($tags as $tag)
                            <span class="tag">{{ $tag }}</span>
                        @endforeach
                    </div>
                </section>
            @endif

            @if(! $hasThinking || filled($project->description))
                <section class="detail-panel reveal">
                    <h2>{{ $hasThinking ? 'Project notes' : 'Overview' }}</h2>
                    <p class="detail-body-copy">{{ $project->description }}</p>
                </section>
            @endif

            @if($liveUrl || $project->project_url)
                <section class="detail-panel reveal">
                    <h2>Links</h2>
                    @if($liveUrl)
                        <p class="detail-body-copy"><a href="{{ $liveUrl }}" target="_blank" rel="noopener">Live: {{ $liveUrl }}</a></p>
                    @endif
                    @if($project->project_url)
                        <p class="detail-body-copy"><a href="{{ $project->project_url }}" target="_blank" rel="noopener">GitHub: {{ $project->project_url }}</a></p>
                    @endif
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
