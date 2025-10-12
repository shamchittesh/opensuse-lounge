@extends('layouts.authenticated')

@section('content')
<div class="max-w-3xl space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-primary">Edit Member</h1>
            <p class="mt-1 text-sm text-secondary">
                Update {{ $member->username }}'s information
            </p>
        </div>
        <x-button href="{{ route('members.index') }}" variant="ghost">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back
        </x-button>
    </div>

    <!-- Form Card -->
    <x-card title="Member Information">
        <form action="{{ route('members.update', $member) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Information Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-primary border-b border-default pb-2">
                    Basic Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-input
                        label="Username"
                        name="username"
                        type="text"
                        placeholder="johndoe"
                        :value="old('username', $member->username)"
                        required
                    />

                    <x-dropdown
                        label="Status"
                        name="status"
                        placeholder="Select status"
                        :options="App\Enums\Enums\MemberStatus::asSelect()"
                        :value="old('status', $member->status->value)"
                        required
                    />
                </div>
            </div>

            <!-- Email Information Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-primary border-b border-default pb-2">
                    Email Information
                </h3>

                <x-input 
                    label="Email Target"
                    name="email_target"
                    type="email"
                    placeholder="john@example.com"
                    :value="old('email_target', $member->email_target)"
                    helpText="Primary email address for this member"
                    required
                />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-input 
                        label="Email Nick"
                        name="email_nick"
                        type="text"
                        placeholder="johndoe"
                        :value="old('email_nick', $member->email_nick)"
                    />

                    <x-input 
                        label="Email Full"
                        name="email_full"
                        type="email"
                        placeholder="john.doe@opensuse.org"
                        :value="old('email_full', $member->email_full)"
                    />
                </div>
            </div>

            <!-- Libera IRC Information Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-medium text-primary border-b border-default pb-2">
                    Libera IRC Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-input 
                        label="Libera Nick"
                        name="libera_nick"
                        type="text"
                        placeholder="johndoe"
                        :value="old('libera_nick', $member->libera_nick)"
                        helpText="IRC nickname on Libera.Chat"
                    />

                    <x-input 
                        label="Libera Cloak"
                        name="libera_cloak"
                        type="text"
                        placeholder="opensuse/member/johndoe"
                        :value="old('libera_cloak', $member->libera_cloak)"
                    />
                </div>

                <x-input 
                    label="Libera Cloak Applied Date"
                    name="libera_cloak_applied"
                    type="datetime-local"
                    :value="old('libera_cloak_applied', $member->libera_cloak_applied ? \Carbon\Carbon::parse($member->libera_cloak_applied)->format('Y-m-d\TH:i') : '')"
                    helpText="When was the cloak applied?"
                />
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-default">
                <x-button href="{{ route('members.index') }}" variant="ghost">
                    Cancel
                </x-button>
                <x-button type="submit" variant="primary">
                    Update Member
                </x-button>
            </div>
        </form>
    </x-card>
</div>
@endsection
