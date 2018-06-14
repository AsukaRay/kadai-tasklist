<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    
use App\Tasklist;

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        
         $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
            $data += $this->counts($user);
        
            return view('tasklists.index', $data);
        }else {
            return view('welcome');
        }
    
        
    }

// omission

    // "New registration screen display processing" when `messages/create` is accessed with GET
     public function create()
    {
        $tasklist = new Tasklist;

        return view('tasklists.create', [
            'tasklist' => $tasklist,
        ]);
    }

    // "New registration processing" when `messages/` is accessed by POST
 public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',  
            'content' => 'required|max:191',
        ]);

         $request->user()->tasklists()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);


        return redirect('/');
    }

    // "Acquisition display process" when accessing `messages/id` with GET
    public function show($id)
    {
        $tasklist = Tasklist::find($id);
       $user = \Auth::user(); 
        if($user->id == $tasklist->user_id){
            return view('tasklists.show',[
                    'tasklist'=> $tasklist,
                    ]);
        }else{
            return redirect('/');
        }
     
    }


    // "Update screen display processing" when accessing `messages/id/edit` with GET
   public function edit($id)
    {
        $tasklist = Tasklist::find($id);
        $user = \Auth::user();
        if ($user -> id ==$tasklist->user_id){

        return view('tasklists.edit', [
            'tasklist' => $tasklist,
            ]);
        }else{
            return redirect('/');
        }
    }

    // "Update process" when `s/id` are accessed by PUT or PATCH
  public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:10',   // add
            'content' => 'required|max:191',
        ]);


        $tasklist = Tasklist::find($id);
        $tasklist->status = $request->status;    // add
        $tasklist->content = $request->content;
        $tasklist->save();


        return redirect('/');
    }

    // "Delete processing" when `messages/id` is accessed by DELETE
     public function destroy($id)
    {
       $tasklist = Tasklist::find($id);
        $tasklist->delete();

        if (\Auth::id() === $tasklist->user_id) {
            $tasklist->delete();
        }

        return redirect('/');
    }
}