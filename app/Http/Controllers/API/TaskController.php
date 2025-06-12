<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all(), 200);
    }

    //storing datas
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    //updating status
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])],
        ]);

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->status = $validated['status'];
        $task->save();

        return response()->json($task, 200);
    }

    //deleting a data
    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }

    //filtering by status
    public function filterByStatus($status)
    {
        if (!in_array($status, ['pending', 'in_progress', 'completed'])) {
            return response()->json(['message' => 'Invalid status'], 422);
        }

        $tasks = Task::where('status', $status)->get();

        return response()->json($tasks, 200);
    }
}
