<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use App\Models\User;


class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request, User $user)
    {

       $todolists = Todolist::paginate(5);
       return view('index', compact('todolists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

            $todolist = new Todolist();
            $todolist->content = $data['content'];
            $todolist->save();
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $todo = Todolist::find($id);
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todolist::find($id);
        $todo->content = $request->content;
        $todo->save();

        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
    public function search(Request $request)
    {
        $get = $_GET['search'];
        $todolists = Todolist::where('content', 'like', '%' . $get . '%')->get();
        return view('search', compact('todolists'));
    }


}
