@extends('layouts.app')

@section('content')
    <!-- Nothing fancy -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm">
                <h1>Edit Bookmark</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bookmarks.update', $bookmark->id) }}" method="POST">
                    <div class="form-group">
                        <label for="name-input">Name</label>
                        <input id="name-input" type="text"
                               class="form-control"
                               name="name"
                               placeholder="Enter a name"
                               value="{{ $bookmark->name }}">
                    </div>
                    <div class="form-group">
                        <label for="url-input">URL</label>
                        <input id="url-input" type="text"
                               class="form-control"
                               name="url"
                               placeholder="Enter a URL"
                               value="{{ $bookmark->url }}">
                    </div>
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
