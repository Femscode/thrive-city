@extends('frontend.master')

@section('header')
<link rel="stylesheet" href="{{ url('assets/css/blogs.css') }}">
@endsection

@section('content')
<section class="blog-hero">
    <div class="blog-hero-container">
        <div class="blog-hero-content">
            <h1 class="blog-hero-title">Our Blogs</h1>
            <p class="blog-hero-subtitle">Insights, stories, and updates from ThriveCity Studio.</p>
        </div>
    </div>
    </section>

    <section class="blogs-section">
        <div class="blogs-container">
            @if($blogs->count())
                <div class="blogs-grid">
                    @foreach($blogs as $blog)
                        <article class="blog-card">
                            <a href="{{ route('blogs.details', $blog->slug) }}" class="blog-image-link" aria-label="View blog: {{ $blog->title }}">
                                @if($blog->image_path)
                                    <img src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $blog->image_path }}" alt="{{ $blog->title }}" class="blog-image">
                                @else
                                    <div class="blog-image-empty">ThriveCity Blog</div>
                                @endif
                            </a>
                            <div class="blog-info">
                                <h2 class="blog-title">
                                    <a href="{{ route('blogs.details', $blog->slug) }}">{{ $blog->title }}</a>
                                </h2>
                                <p class="blog-excerpt">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 160) }}
                                </p>
                                <div class="blog-actions">
                                    <a class="btn-read-more" href="{{ route('blogs.details', $blog->slug) }}">Read More</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                @if($blogs->hasPages())
                    {{ $blogs->links() }}
                @endif
            @else
                <div class="blogs-empty">
                    <h3>No blogs published yet</h3>
                    <p>Check back soon for updates from the ThriveCity team.</p>
                    <a href="/" class="btn-primary">Go Home</a>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('script')
@endsection