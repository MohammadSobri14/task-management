<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_create_a_task()
    {
        $payload = [
            'title' => 'Learn Laravel',
            'category' => 'Programming',
            'priority' => 'High',
            'deadline' => now()->addDays(3)->toDateString(),
        ];

        $response = $this->postJson('/api/tasks', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment(['title' => 'Learn Laravel']);
    }

    /** @test */
    public function it_can_fetch_all_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    /** @test */
    public function it_can_fetch_a_single_task()
    {
        $task = Task::factory()->create();

        $response = $this->getJson('/api/tasks/' . $task->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $task->id]);
    }

    /** @test */
    public function it_returns_404_if_task_not_found()
    {
        $response = $this->getJson('/api/tasks/999');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_update_a_task()
    {
        $task = Task::factory()->create();

        $update = [
            'title' => 'Updated Task Title',
            'priority' => 'Low',
        ];

        $response = $this->putJson('/api/tasks/' . $task->id, $update);

        $response->assertStatus(200)
            ->assertJsonFragment(['title' => 'Updated Task Title']);
    }

    /** @test */
    public function it_can_delete_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson('/api/tasks/' . $task->id);

        $response->assertStatus(200)
            ->assertJsonFragment(['message' => 'Task deleted successfully.']);
    }

    /** @test */
    public function it_validates_task_creation()
    {
        $payload = [
            'title' => '',
            'priority' => 'Extreme',
            'deadline' => '2020-01-01',
        ];

        $response = $this->postJson('/api/tasks', $payload);

        $response->assertStatus(400)
            ->assertJsonStructure(['error', 'messages']);
    }
}
