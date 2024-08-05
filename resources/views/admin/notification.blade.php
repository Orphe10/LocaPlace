@extends('admin.dashboard.template')

@section('content')
<div class="container">
    <h1 class="fw-bolder fs-2">Toutes les Notifications</h1>
    <ul class="list-group">
        @foreach ($notifications as $notification)
            <li class="py-3 list-group-item {{ $notification->read_at ? 'read' : 'unread' }}">
                <strong>{{ $notification->data['name'] }}</strong> vous a envoyé un message:
                <br>
                <span>{{ $notification->data['subject'] }}</span>
                <br>
                <span>{{ $notification->data['email'] }}</span>
                <br>
                <span>{{ $notification->data['message'] }}</span>
                <span class="text-muted">{{ $notification->created_at->diffForHumans() }}</span>
                <form method="POST" action="{{ route('admin.notifications.markAsRead', $notification->id) }}" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-link">Marquer comme lue</button>
                </form>
            </li>
        @endforeach
    </ul>
    <div class="mt-3">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
