<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use Throwable;

class HomeController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    )
    {}

    public function index()
    {
        return rescue(
            fn () => view('tasks', [
                'tasks' => $this->taskService->index(),
            ]),
            fn (Throwable $th) => abort(500, $th->getMessage()),
        );
    }
}
