@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Enrollment Page</div>
  <div class="card-body">

      <form action="{{ url('enrollments/' .$enrollments->id) }}" method="post">
        @csrf
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$enrollments->id}}" id="id" />
        <label>Enroll No</label></br>
        <input type="text" name="enroll_no" id="enroll_no" class="form-control" value="{{ old("enroll_no") }}"></br>

        <label>Batch</label></br>
        <input type="text" name="batch_id" id="batch_id" class="form-control" value="{{ old("batch_id") }}">
       </br>
        <label>Student</label></br>
        <input type="text" name="student_id" id="student_id" class="form-control" value="{{ old("student_id") }}">

        </br>
        <label>Join Date</label></br>
        <input type="text" name="join_date" id="join_date" class="form-control" value="{{ old("join_date") }}">

        </br>
        <label>Fee</label></br>
        <input type="text" name="fee" id="fee" class="form-control" value="{{ old("fee") }}">

        </br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
