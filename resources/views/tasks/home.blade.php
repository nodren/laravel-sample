@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @if (!Auth::check())
                        <div class="panel-body">
                            Please Login.
                        </div>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{!! ($task->completed ? '<s>' : '') . $task->task . ($task->completed ? '</s>' : '') !!}</td>
                                    <td><a href="{{ route('task.update', ['task' => $task->id]) }}">{{$task->completed ? 'Re-open' : 'Complete'}} Task</a> | <a href="{{ route('task.delete', ['task' => $task->id]) }}">Delete Task</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="panel-footer">
                        <form method="POST" action="/create">
                            {!! csrf_field() !!}
                            <input type="text" name="task" placeholder="Enter new task..." class="form-control">
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
