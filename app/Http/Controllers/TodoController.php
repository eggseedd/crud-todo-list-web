<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // Get the sort parameter from the request, default to 'asc'
        $sort = $request->input('sort', 'asc');
    
        // Validate the sort parameter
        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'asc';
        }
    
        $filterDate = $request->input('filter_date');

        // Fetch todos for the logged-in user and sort them by deadline
        $todos = $user->todos()
        ->when($filterDate, function($query, $filterDate) {
            return $query->whereDate('deadline', $filterDate);
        })
        ->orderBy('deadline', $sort)
        ->get();
    
        return view('dashboard', compact('todos', 'sort', 'filterDate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity' => 'required|string',
            'deadline' => 'required|date',
        ]);

        auth()->user()->todos()->create($request->all());

        return redirect()->back()->with('status', 'Activity added!');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->back()->with('status', 'Activity deleted!');
    }

    public function edit($id)
    {
        // Find the todo item by its ID
        $todo = Todo::findOrFail($id);

        // Ensure the logged-in user can only edit their own todo
        if ($todo->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'activity' => 'required|string',
            'deadline' => 'required|date',
        ]);

        // Find the todo item by its ID
        $todo = Todo::findOrFail($id);

        // Ensure the logged-in user can only update their own todo
        if ($todo->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Update the todo item
        $todo->update($request->only(['activity', 'deadline']));

        return redirect()->route('dashboard')->with('status', 'Activity updated!');
    }
}

