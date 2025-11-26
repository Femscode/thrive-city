@extends('layouts.admin')

@section('header')
    <div class="flex items-center">
        <h2 class="font-semibold text-lg text-slate-800">Blog Details</h2>
    </div>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4"><a href="{{ route('blog.index') }}" class="btn-outline">Back</a></div>
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-2xl font-semibold text-slate-800 mb-4">{{ $blog->title }}</h1>
                @if($blog->image_path)
                    <img src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $blog->image_path }}" alt="{{ $blog->title }}" class="w-full max-h-[360px] object-cover rounded mb-6">
                @endif

                <article class="prose max-w-none">
                    {!! $blog->description !!}
                </article>
            </div>
        </div>
    </div>
@endsection