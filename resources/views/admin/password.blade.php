@extends('layouts.admin')

@section('header', 'Reset Password')

@section('content')
<div class="max-w-2xl">
    @if (session('status') === 'password-updated')
        <div class="mb-4 rounded-md bg-green-50 border border-green-200 text-green-700 px-4 py-3">
            Password updated successfully.
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="current_password" class="block text-sm font-medium text-slate-700">Current Password</label>
                <input id="current_password" name="current_password" type="password" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-violet-500 focus:ring-violet-500" autocomplete="current-password">
                @error('current_password', 'updatePassword')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-slate-700">New Password</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-violet-500 focus:ring-violet-500" autocomplete="new-password">
                @error('password', 'updatePassword')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirm New Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-violet-500 focus:ring-violet-500" autocomplete="new-password">
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="inline-flex items-center rounded-md bg-violet-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection