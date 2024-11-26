<?php

/*
 * Issues :
 * The function does not validate user input.
 * Directly assigning $request->title and $request->description without using $fillable or $guarded in the model exposes the application to mass assignment attacks
 * There’s no error handling for the save() method
 * */

public function createTask(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
    ]);

    try {
        $task = Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => 'pending',
        ]);

        return response()->json([
            'status' => 201
            'message' => 'Task created successfully',
            'task' => $task
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 500
            'error' => 'Task creation failed',
            'details' => $e->getMessage()
        ], 500);
    }
}
