@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="bg-white/5 rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 7h-4m0 0l2-2m-2 2l2 2" />
            </svg>
            Delivery Settings
        </h2>
        @if(session('success'))
            <div class="bg-green-600/20 border border-green-600 text-green-100 rounded p-3 mb-4">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="bg-red-600/20 border border-red-600 text-red-100 rounded p-3 mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.delivery.update') }}" class="space-y-4">
            @csrf
            <div>
                <label for="price" class="block text-sm mb-2">Delivery Price</label>
                <input type="number" step="0.01" min="0" id="price" name="price" value="{{ number_format($delivery->price, 2) }}" class="w-full bg-white/10 border border-white/20 rounded px-3 py-2" />
                <p class="text-xs text-white/70 mt-1">Stable delivery charge applied to every order.</p>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 rounded bg-indigo-600 hover:bg-indigo-500 text-white">Update Delivery Price</button>
            </div>
        </form>
    </div>
</div>
@endsection