@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Enrollment Page</div>
  <div class="card-body">

      <form action="{{ url('enrollments') }}" method="post">
        @csrf
        <label>Enroll No</label></br>
        <input type="text" name="enroll_no" id="enroll_no" class="form-control" value="{{ old("enroll_no") }}">
        @error('enroll_no')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <label>Batch</label></br>
        <input type="text" name="batch_id" id="batch_id" class="form-control" value="{{ old("batch_id") }}">
        @error('batch_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <label>Student</label></br>
        <input type="text" name="student_id" id="student_id" class="form-control" value="{{ old('student_id') }}">
        @error('student_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <label>Join Date</label></br>
        <input type="text" name="join_date" id="join_date" class="form-control" value="{{ old('join_date') }}">
        @error('join_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <label>Fee</label></br>
        <input type="text" name="fee" id="fee" class="form-control" value="{{ old('fee') }}">
        @error('fee')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
