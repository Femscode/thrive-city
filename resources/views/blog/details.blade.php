@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $blog->title }}</h2>
    </div>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6">
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