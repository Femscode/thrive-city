@extends('frontend.master')

@section('header')
<link rel="stylesheet" href="{{ url('assets/css/blogs.css') }}">
@endsection

@section('content')
<section class="blog-detail-hero">
    <div class="blog-detail-hero-container">
        <div class="blog-detail-hero-content">
            <h1 class="blog-detail-title">{{ $blog->title }}</h1>
            @if(!empty($blog->created_at))
                <p class="blog-detail-meta">Published {{ $blog->created_at->format('M d, Y') }}</p>
            @endif
        </div>
    </div>
</section>

<section class="blog-detail-section">
    <div class="blog-detail-container">
        @if($blog->image_path)
            <div class="blog-detail-image-wrap">

                <img src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $blog->image_path }}" alt="{{ $blog->title }}" class="blog-detail-image">
            </div>
        @endif
        <article class="blog-detail-content">
            {!! $blog->description !!}
        </article>

        <div class="blog-detail-actions">
            <a href="{{ route('blogs') }}" class="btn-secondary">Back to Blogs</a>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection