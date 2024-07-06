<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public static function create(array $data): Task
    {
        return Task::query()->create($data);
    }

    public static function update(Task $task, array $data): Task
    {
        $task->update($data);
        return $task->fresh();
    }
}
