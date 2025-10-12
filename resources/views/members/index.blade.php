@extends('layouts.authenticated')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-primary">Members</h1>
            <p class="mt-1 text-sm text-secondary">
                Manage openSUSE community members
            </p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            @can('export', App\Models\Member::class)
                <x-button href="{{ route('members.export') }}" variant="secondary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                    </svg>
                    Export CSV
                </x-button>
            @endcan
            @can('create', App\Models\Member::class)
                <x-button href="{{ route('members.create') }}" variant="primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Member
                </x-button>
            @endcan
        </div>
    </div>

    <!-- Members Table Card -->
    <x-card :padding="false">
        <x-table :headers="['Username', 'Email', 'Status', 'Libera Nick', 'Actions']">
            @forelse ($members as $member)
                <tr class="hover:bg-card-hover transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-brand rounded-full flex items-center justify-center">
                                <span class="text-white font-medium text-sm">
                                    {{ strtoupper(substr($member->username, 0, 2)) }}
                                </span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-primary">
                                    {{ $member->username }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-primary">{{ $member->email_target }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $statusColors = [
                                'active' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                                'emeritus' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
                                'inactive' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300',
                            ];
                            $colorClass = $statusColors[$member->status->value] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colorClass }}">
                            {{ ucfirst($member->status->value) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-primary">
                        {{ $member->libera_nick ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        @can('view', $member)
                            <a href="{{ route('members.show', $member) }}" 
                               class="text-primary hover:text-brand transition-colors">
                                View
                            </a>
                        @endcan
                        @can('update', $member)
                            <a href="{{ route('members.edit', $member) }}" 
                               class="text-primary hover:text-brand transition-colors">
                                Edit
                            </a>
                        @endcan
                        @can('delete', $member)
                            <form action="{{ route('members.destroy', $member) }}" 
                                  method="POST" 
                                  class="inline"
                                  onsubmit="return confirm('Are you sure you want to delete this member?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-button-danger hover:text-button-danger/90 transition-colors">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-muted mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <h3 class="text-lg font-medium text-primary mb-1">No members found</h3>
                            <p class="text-sm text-secondary">Get started by creating a new member.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </x-table>
    </x-card>

    <!-- Pagination -->
    @if($members->hasPages())
        <div class="mt-6">
            {{ $members->links() }}
        </div>
    @endif
</div>
@endsection
