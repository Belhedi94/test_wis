<?php

namespace tests\Features;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase {
    use RefreshDatabase;

    public function test_store_task_method()
    {
        $taskData = [
            'title' => 'Test Task',
            'description' => 'This is a description for the test task.',
        ];

        $response = $this->postJson('/api/tasks', $taskData);

        $response->assertStatus(201)
        ->assertJson([
            'status' => 201,
            'message' => 'New task created successfully.',
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => $taskData['title'],
            'description' => $taskData['description'],
        ]);
    }
}
