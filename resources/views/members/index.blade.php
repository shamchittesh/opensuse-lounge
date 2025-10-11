@extends('layouts.app')

@section('content')
<h1>Members</h1>

@can('create', App\Models\Member::class)
    <a href="{{ route('members.create') }}">Create New Member</a>
@endcan

@can('export', App\Models\Member::class)
    <a href="{{ route('members.index', ['export' => 'csv']) }}">Export CSV</a>
@endcan

<table border="1">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email Target</th>
            <th>Status</th>
            <th>Libera Nick</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($members as $member)
            <tr>
                <td>{{ $member->username }}</td>
                <td>{{ $member->email_target }}</td>
                <td>{{ $member->status->value }}</td>
                <td>{{ $member->libera_nick ?? '-' }}</td>
                <td>
                    @can('view', $member)
                        <a href="{{ route('members.show', $member) }}">View</a>
                    @endcan
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
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No members found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $members->links() }}
@endsection
