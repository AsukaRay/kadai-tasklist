<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tasklist;    // add

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasklists = Tasklist::all();

        return view('tasklists.index', [
            'tasklists' => $tasklists,
        ]);
    }

// omission

    // "New registration screen display processing" when `messages/create` is accessed with GET
     public function create()
    {
        $tasklist = new Tasklist;

        return view('tasklist.create', [
            'tasklist' => $tasklist,
        ]);
    }

    // "New registration processing" when `messages/` is accessed by POST
   public function store(Request $request)
    {
        $tasklist = new Tasklist;
        $tasklist->content = $request->content;
        $tasklist->save();

        return redirect('/');
    }

    // "Acquisition display process" when accessing `messages/id` with GET
    public function show($id)
    {
        $tasklist = Tasklist::find($id);

        return view('tasklists.show', [
            'Tasklist' => $tasklist,
        ]);
    }


    // "Update screen display processing" when accessing `messages/id/edit` with GET
   public function edit($id)
    {
        $tasklist = Tasklist::find($id);

        return view('tasklists.edit', [
            'tasklist' => $tasklist,
        ]);
    }

    // "Update process" when `messages/id` are accessed by PUT or PATCH
   public function update(Request $request, $id)
    {
        $tasklist = Tasklists::find($id);
        $tasklist->content = $request->content;
        $tasklist->save();

        return redirect('/');
    }

    // "Delete processing" when `messages/id` is accessed by DELETE
     public function destroy($id)
    {
        $tasklist = Message::find($id);
        $tasklist->delete();

        return redirect('/');
    }
}