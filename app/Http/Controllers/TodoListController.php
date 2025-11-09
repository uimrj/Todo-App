<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\todo_list;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    // ------------------------------------------------------------------

    public function save(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save to database
        $todo = new todo_list();
        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->status = $request->status;

        // Image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/todo/'), $filename);
            $todo->image = $filename;
        }

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
            'status' => 'required|in:Active,Inactive',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $todo = todo_list::findOrFail($id);

        $todo->name = $request->name;
        $todo->description = $request->description;
        $todo->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($todo->image && file_exists(public_path('uploads/todo/' . $todo->image))) {
                unlink(public_path('uploads/todo/' . $todo->image));
            }

            // Upload new image
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/todo/'), $filename);

            $todo->image = $filename;
        }

        $todo->save();

        return redirect()->route('todolist.home')->with('success', 'Todo updated successfully');
    }

    public function destroy($id)
    {
        $todo = todo_list::findOrFail($id);
        $todo->delete();

        return redirect()->route('todolist.home')->with('success', 'Todo deleted successfully!');
    }

    public function about()
    {
        return view('todo_list.about');
    }

    public function changeStatus(Request $request)
    {
        $record = todo_list::find($request->id);

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $record->status = ($record->status == 'Active') ? 'Inactive' : 'Active';
        $record->save();

        return response()->json([
            'status' => $record->status
        ]);
    }

    public function login()
    {
        return view('todo_list.login');
    }

    public function register()
    {
        return view('todo_list.register');
    }

    public function dashboard()
    {
        $totalTasks = todo_list::count();  // Correct model name

        return view('todo_list.dashboard', compact('totalTasks'));
    }

    public function registerUser(Request $data)
    {
        // Validate the incoming request
        $data->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Create new user
        $newUser = new User();
        $newUser->fullname = $data->input('name');
        $newUser->email = $data->input('email');
        $newUser->password = bcrypt($data->input('password'));  // Hash the password

        if ($newUser->save()) {
            return redirect()->route('todolist.login')->with('success', 'Congratulations! Your account is ready.');
        }

        // Optional: handle save failure
        return back()->with('error', 'Something went wrong. Please try again.');
    }

    public function loginUser(Request $data)
    {
        $data->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data->input('email'))->first();

        if ($user && Hash::check($data->input('password'), $user->password)) {
            auth()->login($user);
            return redirect()->route('todolist.dashboard')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        auth()->logout();  // log the user out
        return redirect()->route('todolist.login')->with('success', 'Logged out successfully!');
    }

    public function gallery()
    {
        return view('todo_list.gallery');
    }

    public function welcome()
    {
        return view('todo_list.welcome');
    }
}
