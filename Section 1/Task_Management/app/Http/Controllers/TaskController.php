<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Class TaskController
 * Handles Task creation, update task and retrieving a list of tasks.
 */
class TaskController extends Controller
{
    /**
     * Store a newly created task in the database.
     *
     * @param Request $request The incoming HTTP request containing task data.
     * @return \Illuminate\Http\JsonResponse A JSON response indicating success or failure.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description']
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'New task created successfully.',
        ], 201);
    }

    /**
     * Update the status of an existing task.
     *
     * @param Request $request The incoming HTTP request containing the new status.
     * @param int $id The ID of the task to be updated.
     * @return \Illuminate\Http\JsonResponse A JSON response with the updated task or an error.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,completed',
        ]);

        $task = Task::findOrFail($id);
        $task->update(['status' => $validated['status']]);

        return response()->json([
            'status' => 200,
            'message' => 'Task updated successfully.',
            'data' => $task,
        ], 200);
    }

    /**
     * Retrieve a paginated list of tasks.
     *
     * @return \Illuminate\Http\JsonResponse A JSON response containing the paginated list of tasks.
     */
    public function index()
    {
        $tasks = Task::paginate(10);

        return response()->json([
            'status' => 200,
            'message' => 'Tasks retrieved successfully.',
            'data' => $tasks,
        ], 200);
    }
}
