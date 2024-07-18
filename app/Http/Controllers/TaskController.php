<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use App\Services\TaskService;
use Throwable;

class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    )
    {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return rescue(
            fn () => view('tasks', [
                'tasks' => $this->taskService->index(),
            ]),
            fn (Throwable $th) => abort(500, $th->getMessage()),
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request)
    {
        return rescue(
            function () use ($request) {
                $this->taskService->store($request);

                return redirect()->route('tasks.index')->with('success', __('Task successfully added'));
            },
            fn (Throwable $th) => abort(500, $th->getMessage()),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function markAsCompleted(Task $task)
    {
        return rescue(
            function () use ($task) {
                $this->taskService->markAsCompleted($task);

                return redirect()->route('tasks.index')->with('success', __('Task marked as completed successfully'));
            },
            fn (Throwable $th) => abort(500, $th->getMessage()),
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        return rescue(
            function () use ($task) {
                $this->taskService->destroy($task);

                return redirect()->route('tasks.index')->with('success', __('Task deleted successfully')); 
            },
            fn (Throwable $th) => abort(500, $th->getMessage()),
        );
    }
}
