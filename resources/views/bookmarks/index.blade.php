@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">URL</th>
                        <th scope="col">User</th>
                        <th scope="col" style="min-width: 150px">Created at</th>
                        <th scope="col" style="min-width: 150px">Updated at</th>
                        <th scope="col" style="min-width: 125px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookmarks as $bookmark)
                    <tr>
                        <th scope="row">{{ $bookmark->id }}</th>
                        <td>{{ $bookmark->name }}</td>
                        <td><a href="{{ $bookmark->url }}" target="_blank">{{ $bookmark->url }}</a></td>
                        <td>{{ $bookmark->user->name }}</td>
                        <td style="min-width: 150px">{{ $bookmark->created_at->format('m-d-Y') }}</td>
                        <td style="min-width: 150px">{{ $bookmark->updated_at->format('m-d-Y') }}</td>
                        <td>
                            @if(auth()->user()->id === $bookmark->user_id)
                                <a href="{{ route('bookmarks.edit', $bookmark->id) }}">Edit</a> |
                                <a href="{{ route('bookmarks.delete', $bookmark->id) }}">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection