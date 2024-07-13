<?php

namespace App\Http\Controllers\Api;

use App\Dto\TaskData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(Task::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TaskData $taskData, TaskService $taskService)
    {
        $data = $taskData::from($request->all());

        $taskService::create(data: $data->toArray());
        return response('success', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json(['error' => '404 Not Found'], 404);
        }
        return TaskResource::make(Task::find($id))->resolve();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Task $task, TaskService $taskService)
    {
        $data = $request->validated();

        $task = $taskService::update(task: $task, data: $data);

        return TaskResource::make($task)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
