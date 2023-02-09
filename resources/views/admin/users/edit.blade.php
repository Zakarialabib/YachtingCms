@extends('layouts.backend')

@section('page-title', __('Edit - ') . ($user->name))

@section('content')

<div class="card bg-white dark:bg-dark-eval-1">
    <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
        <div class="card-header-container flex flex-wrap">
            <h6 class="text-xl font-bold text-zinc-700 dark:text-zinc-300">
                {{ __('User') }} : 
                {{ $user->name }}
            </h6>
        </div>
    </div>

    <div class="p-4">
        @livewire('admin.user.edit', [$user])
    </div>
</div>

@endsection