@extends('layout')

@section('content')
<h1 class="title">{{ $project->title }}</h1>

<div class="content">
{{$project->description}}
<p><a href="/projects/{{$project->id}}/edit" >Edit</a></p>

</div>

@if($project->tasks->count())
<div class="box">
        @foreach($project->tasks as $task)
            <div>
                <form method="POST" action="/tasks/{{ $task->id }}">
                @csrf
                @method('PUT')
                    <label for="completed" class="checkbox {{ $task->completed? 'is-complete' : '' }}" >
                        <input type="checkbox" {{ $task->completed? 'checked' : '' }} name="completed" onChange="this.form.submit()">
                        {{ $task->description }}
                    </label>
                </form>
            </div>
        @endforeach
</div>
@endif

<form class="box" action="/projects/{{$project->id}}/tasks" method="POST">
    @csrf
    <div class="field">
        <label for="" class="label">New Task</label>
            <div class="control">
                <input type="text" class="input" placeholder="Please add a new task" name="description">
            </div>
    </div>
    <div class="field">
            <div class="control">
                <button type="submit" class="button is-link" >Add Task</button>
            </div>
    </div>
    @include('errors')

</form>

@endsection