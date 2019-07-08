@extends('layout')

@section('content')
<h1 class="title">Edit project</h1>
<form action="/projects/{{$project->id}}" method="POST" style="margin-bottom:1rem;">
    <!-- {{ csrf_field() }}
    {{ method_field('PUT') }} -->
    @method('PUT')
    @csrf
    <div class="field">
        <label class="label" for="title">Title</label>
        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
        </div>
    </div>

    <div class="field">
        <label class="label" for="description">Description</label>
        <div class="control">
        <textarea name="description" class="textarea" id="description">{{$project->description}}</textarea>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Update project</button>
        </div>
    </div>
</form>
<form action="/projects/{{$project->id}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <div class="field">
        <div class="control">
            <button type="submit" class="button">Delete project</button>
        </div>
    </div>
</form>

@endsection