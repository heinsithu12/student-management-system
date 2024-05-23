@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Course Page</div>
  <div class="card-body">

      <form action="{{ url('courses') }}" method="post">
        @csrf
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{ old("name") }}">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <label>syllabus</label></br>
        <input type="text" name="syllabus" id="syllabus" class="form-control" value="{{ old("syllabus") }}">
        @error('syllabus')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <label>duration</label></br>
        <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}">
        @error('duration')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
