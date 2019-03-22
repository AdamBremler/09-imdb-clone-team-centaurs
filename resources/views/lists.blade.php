@extends('layouts.app')

@section('content')
    <div class="card">
        @if ($userExists)
            <h2 class="card-header">Lists by {{ $user->name }}</h2>
            <div class="card-body p-0">
                <div class="list-group list-group-flush bg-light">
                    @forelse ($lists as $list)
                        <div class="list-group-item list-group-item-action d-flex justify-content-between py-0">
                            <a class="col h5 text-dark m-0 py-3" href="lists/{{ $list->id }}">
                                {{ $list->name }}
                                <div class="badge badge-secondary ml-3">
                                    {{ count($list->movies->toArray()) }} movies
                                </div>
                            </a>
                            @if ($isUserOwner)
                                <div class="d-flex flex-column justify-content-around">
                                    <form action="lists/{{ $list->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">X</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div>No lists found.</div>
                    @endforelse
                </div>
            </div>
        @else
            <h2 class="card-header">This user does not exist.</h2>
        @endif
    </div>
@endsection
