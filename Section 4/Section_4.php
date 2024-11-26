<?php
/*
Cause: Database connection can result in a 500 error.
Debug process :
 1) We will observe the response details in Postman or browser. A detailed error message will point to the source of the issue.
 2) We will open the log file to identify error messages and stack traces related to the 500 error
Fix: We will wrap the code in a try-catch block to handle exceptions:
*/
public function store(Request $request) {
    try {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => 'pending',
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'New task created successfully.',
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'error' => $e->getMessage(),
        ], 500);
    }
}
