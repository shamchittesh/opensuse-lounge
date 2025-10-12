@extends('layouts.app')

@section('content')
<h1>Member Details</h1>

<a href="{{ route('members.index') }}">Back to Members</a>

@can('update', $member)
    <a href="{{ route('members.edit', $member) }}">Edit</a>
@endcan

@can('delete', $member)
    <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endcan

<table border="1">
    <tr>
        <th>Username</th>
        <td>{{ $member->username }}</td>
    </tr>
    <tr>
        <th>Email Target</th>
        <td>{{ $member->email_target }}</td>
    </tr>
    <tr>
        <th>Email Nick</th>
        <td>{{ $member->email_nick ?? '-' }}</td>
    </tr>
    <tr>
        <th>Email Full</th>
        <td>{{ $member->email_full ?? '-' }}</td>
    </tr>
    <tr>
        <th>Libera Nick</th>
        <td>{{ $member->libera_nick ?? '-' }}</td>
    </tr>
    <tr>
        <th>Libera Cloak</th>
        <td>{{ $member->libera_cloak ?? '-' }}</td>
    </tr>
    <tr>
        <th>Libera Cloak Applied</th>
        <td>{{ $member->libera_cloak_applied ?? '-' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $member->status->name }}</td>
    </tr>
    <tr>
        <th>Created At</th>
        <td>{{ $member->created_at->format('Y-m-d H:i:s') }}</td>
    </tr>
    <tr>
        <th>Updated At</th>
        <td>{{ $member->updated_at->format('Y-m-d H:i:s') }}</td>
    </tr>
</table>
@endsection
