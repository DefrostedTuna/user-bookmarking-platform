@extends('layouts.app')

@section('content')
    <!-- Nothing fancy -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm">
                <h1>New Bookmark</h1>
                <form action="{{ route('bookmarks.store') }}" method="POST">
                    <div class="form-group">
                        <label for="name-input">Name</label>
                        <input id="name-input" type="text"
                               class="form-control"
                               name="name"
                               placeholder="Enter a name">
                    </div>
                    <div class="form-group">
                        <label for="url-input">URL</label>
                        <input id="url-input" type="text"
                               class="form-control"
                               name="url"
                               placeholder="Enter a URL">
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
