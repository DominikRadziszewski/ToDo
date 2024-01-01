<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */  
    
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }
  
    
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:255', // Add any validation rules as needed
        ]);
    
        $task = new Task();
        $task->task = $request->input('task');
        $task->save();
    
        return redirect()->route('task.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
        
        public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $task->status = $request->input('status');
    $task->save();

    return redirect()->back(); // Przekieruj na poprzednią stronę (możesz dostosować to do swoich potrzeb)
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index');
    }
}
