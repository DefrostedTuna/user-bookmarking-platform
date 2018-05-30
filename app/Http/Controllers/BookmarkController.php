<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Http\Requests\CreateBookmarkFormRequest;
use App\Http\Requests\UpdateBookmarkFormRequest;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Bookmark $bookmarks
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bookmark $bookmarks)
    {
        $bookmarks = $bookmarks->with('user')->orderBy('name')->get();

        return view('bookmarks.index')->with([
            'bookmarks' => $bookmarks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateBookmarkFormRequest  $request
     * @param  \App\Bookmark  $bookmark
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookmarkFormRequest $request, Bookmark $bookmark)
    {
        $bookmark->fill($request->input());

        auth()->user()->bookmarks()->save($bookmark);

        return redirect()->route('bookmarks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        return view('bookmarks.show')->with([
            'bookmark' => $bookmark,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        return view('bookmarks.edit')->with([
            'bookmark' => $bookmark,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookmarkFormRequest  $request
     * @param  \App\Bookmark  $bookmark
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookmarkFormRequest $request, Bookmark $bookmark)
    {
        $bookmark->fill($request->input())->save();

        return redirect()->route('bookmarks.index');
    }

    /**
     * Show the confirmation page for deleting a bookmark.
     *
     * @param  \App\Bookmark  $bookmark
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Bookmark $bookmark)
    {
        return view('bookmarks.delete')->with([
            'bookmark' => $bookmark,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();

        return redirect()->route('bookmarks.index');
    }
}
