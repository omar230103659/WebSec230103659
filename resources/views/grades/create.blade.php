@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Grade</h2>
    <form method="POST" action="{{ route('grades.store') }}" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" class="form-control" id="course_code" name="course_code" placeholder="Enter Course Code" required>
        </div>
        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Enter Course Title" required>
        </div>
        <div class="form-group">
            <label for="credit_hours">Credit Hours</label>
            <input type="number" class="form-control" id="credit_hours" name="credit_hours" placeholder="Enter Credit Hours" required>
        </div>
        <div class="form-group">
            <label for="term">Term</label>
            <input type="text" class="form-control" id="term" name="term" placeholder="Enter Term" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="number" class="form-control" id="grade" name="grade" placeholder="Enter Grade" required>
        </div>
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

