@extends('layouts.app')

@section('title')
    Tasks
@endsection

@section('content')
    <div class="md:grid md:grid-cols-12 gap-4">
        <div class="col-span-3">
            <form action="{{ route('tasks.store') }}" method="post">
                @csrf
                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name"></label>
                    <input type="text" name="name" placeholder="Insert  task name" autofocus>
                    @if ($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <button class="btn btn-primary w-full" type="submit">Add</button>
            </form>
        </div>
        <div class="col-span-9">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="bg-white">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">


                                @if ($tasks->count())
                                    <table class="min-w-full divide-y divide-gray-300 mt-2">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="thin">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Task</th>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @foreach ($tasks as $index => $task)
                                                <tr>
                                                    <td>{{ $index + 1}}</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium @if($task->completed) line-through text-gray-500 @else text-gray-900 @endif">{{ $task->name }}</td>
                                                    <td
                                                        class="action">
                                                        <div class="flex gap-2 justify-end">
                                                            @if (!$task->completed)
                                                                <form method="POST" action="{{ route('tasks.complete', $task->id)}}">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <button class="btn btn-success btn-icon" type="submit">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                                                    </button>
                                                                </form>
                                                            @endif

                                                            <form method="POST" action="{{ route('tasks.destroy', $task->id)}}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-error btn-icon" type="submit">
                                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{ $tasks->links() }}
                                @else
                                    <div class="py-4">Yay! you don't have any task today</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
