@extends('layouts.app')

@section('content')
<h1>Edit Member</h1>

<a href="{{ route('members.index') }}">Back to Members</a>

<form action="{{ route('members.update', $member) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="username">Username *</label>
        <input type="text" id="username" name="username" value="{{ old('username', $member->username) }}" required>
        @error('username')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email_target">Email Target *</label>
        <input type="email" id="email_target" name="email_target" value="{{ old('email_target', $member->email_target) }}" required>
        @error('email_target')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email_nick">Email Nick</label>
        <input type="text" id="email_nick" name="email_nick" value="{{ old('email_nick', $member->email_nick) }}">
        @error('email_nick')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email_full">Email Full</label>
        <input type="email" id="email_full" name="email_full" value="{{ old('email_full', $member->email_full) }}">
        @error('email_full')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="libera_nick">Libera Nick</label>
        <input type="text" id="libera_nick" name="libera_nick" value="{{ old('libera_nick', $member->libera_nick) }}">
        @error('libera_nick')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="libera_cloak">Libera Cloak</label>
        <input type="text" id="libera_cloak" name="libera_cloak" value="{{ old('libera_cloak', $member->libera_cloak) }}">
        @error('libera_cloak')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="libera_cloak_applied">Libera Cloak Applied</label>
        <input type="datetime-local" id="libera_cloak_applied" name="libera_cloak_applied" value="{{ old('libera_cloak_applied', $member->libera_cloak_applied) }}">
        @error('libera_cloak_applied')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="status">Status *</label>
        <select id="status" name="status" required>
            @foreach(App\Enums\Enums\MemberStatus::cases() as $status)
                <option value="{{ $status->value }}" {{ old('status', $member->status->value) == $status->value ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
        @error('status')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Update Member</button>
</form>
@endsection
