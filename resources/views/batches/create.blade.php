@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Batches</div>
  <div class="card-body">

      <form action="{{ url('batches') }}" method="post">
        @csrf
        <label>Batch Name</label></br>
        <input type="text" name="name" id="name" class="form-control">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <label>Course</label></br>
        <select name="course_id" id="course_id" class="form-control">
            @foreach($courses as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </br>
        <label>Start Date</label></br>
        <input type="text" name="start_date" id="start_date" class="form-control">
        @error('start_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
