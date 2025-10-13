@extends('layouts.authenticated')

@section('content')
<div class="max-w-4xl space-y-6">
    <!-- Page Header with Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="flex-shrink-0 h-16 w-16 bg-brand rounded-full flex items-center justify-center shadow-brand">
                <span class="text-white font-bold text-2xl">
                    {{ strtoupper(substr($member->username, 0, 2)) }}
                </span>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-primary">{{ $member->username }}</h1>
                <p class="mt-1 text-sm text-secondary">
                    Member since {{ $member->created_at->format('F Y') }}
                </p>
            </div>
        </div>
        <div class="flex flex-wrap gap-3">
            <x-button href="{{ route('members.index') }}" variant="ghost">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back
            </x-button>
            @if($canUpdateMembers)
                <x-button href="{{ route('members.edit', $member) }}" variant="primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </x-button>
            @endif
            @if($canDeleteMembers)
                <form action="{{ route('members.destroy', $member) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this member?')">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" variant="danger">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete
                    </x-button>
                </form>
            @endif
        </div>
    </div>

    <!-- Status Badge -->
    <div>
        @php
            $statusColors = [
                'active' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                'emeritus' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
                'inactive' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300',
            ];
            $colorClass = $statusColors[$member->status->value] ?? 'bg-gray-100 text-gray-800';
        @endphp
        <span class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-full {{ $colorClass }}">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="6"/>
            </svg>
            {{ ucfirst($member->status->value) }} Member
        </span>
    </div>

    <!-- Information Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Basic Information -->
        <x-card title="Basic Information">
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-secondary">Username</dt>
                    <dd class="mt-1 text-base text-primary font-mono">{{ $member->username }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-secondary">Status</dt>
                    <dd class="mt-1 text-base text-primary">{{ $member->status->name }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-secondary">Member Since</dt>
                    <dd class="mt-1 text-base text-primary">{{ $member->created_at->format('F j, Y') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-secondary">Last Updated</dt>
                    <dd class="mt-1 text-base text-primary">{{ $member->updated_at->format('F j, Y g:i A') }}</dd>
                </div>
            </dl>
        </x-card>

        <!-- Email Information -->
        <x-card title="Email Information">
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-secondary">Email Target</dt>
                    <dd class="mt-1 text-base text-primary">
                        <a href="mailto:{{ $member->email_target }}" class="text-brand hover:text-accent transition-colors">
                            {{ $member->email_target }}
                        </a>
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-secondary">Email Nick</dt>
                    <dd class="mt-1 text-base text-primary">{{ $member->email_nick ?? '-' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-secondary">Email Full</dt>
                    <dd class="mt-1 text-base text-primary">
                        @if($member->email_full)
                            <a href="mailto:{{ $member->email_full }}" class="text-brand hover:text-accent transition-colors">
                                {{ $member->email_full }}
                            </a>
                        @else
                            -
                        @endif
                    </dd>
                </div>
            </dl>
        </x-card>
    </div>

    <!-- Libera IRC Information -->
    <x-card title="Libera IRC Information">
        <dl class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <dt class="text-sm font-medium text-secondary">Libera Nick</dt>
                <dd class="mt-1 text-base text-primary font-mono">{{ $member->libera_nick ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-secondary">Libera Cloak</dt>
                <dd class="mt-1 text-base text-primary font-mono">{{ $member->libera_cloak ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-secondary">Cloak Applied</dt>
                <dd class="mt-1 text-base text-primary">
                    @if($member->libera_cloak_applied)
                        {{ \Carbon\Carbon::parse($member->libera_cloak_applied)->format('F j, Y') }}
                    @else
                        -
                    @endif
                </dd>
            </div>
        </dl>
    </x-card>

    <!-- Timestamps -->
    <x-card>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <dt class="text-sm font-medium text-secondary flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Created At
                </dt>
                <dd class="mt-1 text-base text-primary">
                    {{ $member->created_at->format('F j, Y g:i A') }}
                    <span class="text-sm text-muted">({{ $member->created_at->diffForHumans() }})</span>
                </dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-secondary flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Last Updated
                </dt>
                <dd class="mt-1 text-base text-primary">
                    {{ $member->updated_at->format('F j, Y g:i A') }}
                    <span class="text-sm text-muted">({{ $member->updated_at->diffForHumans() }})</span>
                </dd>
            </div>
        </dl>
    </x-card>
</div>
@endsection
