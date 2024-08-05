@extends('agence.dashboard.home')

@section('content')

<div class="container">
    <h1 class=" fw-bolder fs-2">Notifications</h1>
    <form method="POST" action="{{ route('notifications.markAllAsRead') }}">
        @csrf
        <button type="submit" class="btn app-btn-primary mb-3 d-flex ms-auto">Marquer toutes comme lues</button>
    </form>
    <ul class="list-group">
        @forelse ($notifications as $notification)
            <li class=" py-3 list-group-item {{ $notification->read_at ? 'read' : 'unread' }}">
                {{ $notification->data['nom'] }} : {{ $notification->data['message'] }}
                <span class="text-muted">{{ $notification->created_at->diffForHumans() }}</span>
            </li>
        @empty
            <li class="list-group-item">Aucune notification.</li>
        @endforelse
    </ul>
</div>

@endsection
