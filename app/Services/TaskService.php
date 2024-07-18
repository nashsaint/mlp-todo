<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService
{
    /**
     * Get tasks list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return Task::orderBy('created_at', 'desc')->paginate(25);
    }

    /**
     * Store task resource
     *
     * @param Request $request
     * @return App\Models\Task
     */
    public function store(Request $request): Task
    {
        return Task::create($request->validated());
    }

    /**
     * Mark resource as completed
     *
     * @param Task $task
     * @return Task
     */
    public function markAsCompleted(Task $task): bool
    {
        return $task->update(['completed' => true]);
    }

    /**
     * Delete task resource
     *
     * @param Task $task
     * @return boolean
     */
    public function destroy(Task $task): bool
    {
        return $task->delete();
    }
}