<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\todo_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoListController extends Controller
{
    public function home()
    {
        $data = todo_list::get();
        return view('todo_list.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('todo_list.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Save to database

        $todo = new todo_list();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->save();

        return redirect()->route('todolist.home')->with('success', 'Todo item added successfully!');
    }

    public function show(todo_list $todo_list)
    {
        //
    }

    public function edit($id)
    {
        $data = todo_list::findOrFail($id);
        return view('todo_list.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $todo = todo_list::findOrFail($id);

        $todo->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('todolist.home')->with('success', 'Todo updated successfully');
    }

   public function destroy($id)
{
    $todo = todo_list::findOrFail($id);
    $todo->delete();

    return redirect()->route('todolist.home')->with('success', 'Todo deleted successfully!');
}

}
