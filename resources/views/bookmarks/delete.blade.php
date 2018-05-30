@extends('layouts.app')

@section('content')
    <!-- Nothing fancy -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm">
                <h1>Delete Bookmark</h1>
                <h3>Name</h3>
                <p>{{ $bookmark->name }}</p>
                <h3>URL</h3>
                <p><a href="{{ $bookmark->url }}" target="_blank">{{ $bookmark->url }}</a></p>
                <h3>User</h3>
                <p>{{ $bookmark->user->name }}</p>
                <h3>Created at</h3>
                <p>{{ $bookmark->created_at->format('m-d-Y') }}</p>
                <h3>Updated at</h3>
                <p>{{ $bookmark->updated_at->format('m-d-Y') }}</p>
                <h3>Are you sure you want to delete this?</h3>
                <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $bookmark->id }}">
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
