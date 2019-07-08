@extends('layout')

@section('content')
    <h1 class="title">Create a new project</h1>
    <form action="/projects" method="POST">
        {{ csrf_field() }}
        <div class="field">
            <label for="title" class="label">Project Title</label>
            <div class="control">
                <input required value="{{ old('title') }}" type="text" class="input {{ $errors->has('title')? 'is-danger' : '' }}" name="title" placeholder="Project title">
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">Project Description</label>
            <div class="control">
                <textarea required class="textarea {{ $errors->has('description')? 'is-danger' : '' }}"name="description" id="description" cols="30" rows="10" placeholder="Project description">{{old('description')}}</textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create project
            </div>
        </div>
        @include('errors')

    </form>
@endsection