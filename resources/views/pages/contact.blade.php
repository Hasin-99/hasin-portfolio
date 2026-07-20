@extends('layouts.app')

@section('title', 'Contact - Md. Shadman Hasin')
@section('meta_description', 'Contact Md. Shadman Hasin for software roles and collaborations in Dhaka or Faridpur.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')
    <header class="contact-hero">
        <p class="section-label reveal">Contact</p>
        <h1 class="reveal">Write to me if this work looks useful to your team.</h1>
        <p class="reveal">I am looking for full-time software work. Dhaka is easiest. Faridpur works too. Remote conversations are welcome. I answer email and WhatsApp.</p>
    </header>

    <div class="contact-layout">
        <aside class="contact-info reveal">
            <dl class="info-block">
                <dt>Email</dt>
                <dd>
                    <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a>
                    <button type="button" class="copy-chip" data-copy-email="{{ $settings['email'] }}">Copy</button>
                </dd>
            </dl>
            <dl class="info-block">
                <dt>Phone</dt>
                <dd class="phone-stack">
                    @foreach(preg_split('/\s*[·•|]\s*/u', $settings['phone']) as $phone)
                        @if(trim($phone) !== '')
                            <a href="tel:{{ preg_replace('/[^\d+]/', '', $phone) }}">{{ trim($phone) }}</a>
                        @endif
                    @endforeach
                </dd>
            </dl>
            <dl class="info-block">
                <dt>Location</dt>
                <dd>{{ $settings['location'] }}</dd>
            </dl>
            <dl class="info-block">
                <dt>Availability</dt>
                <dd>Full-time · Entry / mid-level · Dhaka & Faridpur</dd>
            </dl>
            <div class="social-row">
                @include('partials.social-links', ['socialSettings' => $settings])
            </div>
        </aside>

        <div class="contact-form-wrap reveal">
            @if(session('success'))
                <div class="alert alert-success" role="status">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error" role="alert">{{ session('error') }}</div>
            @endif

            <form class="contact-form" action="{{ route('contact.store') }}" method="POST" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" minlength="2" maxlength="255">
                    @error('name')<div class="form-errors">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="255">
                    @error('email')<div class="form-errors">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <div class="label-row">
                        <label for="message">Message</label>
                        <span class="char-count" aria-live="polite">0 / 5000</span>
                    </div>
                    <textarea id="message" name="message" required minlength="10" maxlength="5000">{{ old('message') }}</textarea>
                    @error('message')<div class="form-errors">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Send message</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
