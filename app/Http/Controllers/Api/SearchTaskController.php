<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchTaskController extends Controller
{
    public function search(Request $request)
    {
        $tasks = Task::query();

        $timestamp = $request->query('timestamps');
        if (! is_null($timestamp)) {
            $date = date('Y-m-d', $timestamp);
            $tasks->where('deadline', $date);
        }

        $status = $request->query('status');
        if (! is_null($status)) {
            $tasks->where('status', $status);
        }

        return TaskResource::collection($tasks->get())->resolve();
    }
}
