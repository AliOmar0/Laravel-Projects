@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')

<form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}" method="POST">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset

    <div class="mb-4">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title"
        @class(['border-red-500' => $errors->has('title')])
        value="{{ $task->title ?? old('title') }}" />
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="form-label">Description</label>
        <textarea rows="5" class="form-control" id="description" name="description"
        @class(['border-red-500' => $errors->has('description')])>
            {{$task->description ?? old('description')}}
        </textarea>
        @error('description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="long_description" class="form-label">Long Description</label>
        <textarea rows="10" class="form-control" id="long_description" name="long_description"
        @class(['border-red-500' => $errors->has('long_description')])>
            {{$task->long_description ?? old('long_description')}}
        </textarea>
        @error('long_description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="flex items-center gap-2">
    <button type="submit" class="btn btn-primary">
        @isset($task)
            Update task
            @else
            Add Task
        @endisset
    </button>
        <a href="{{ route('tasks.index') }}" class="btn">Cancel</a>
    </div>
</form>

@endsection