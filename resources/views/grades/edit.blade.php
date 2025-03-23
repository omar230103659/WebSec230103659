@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Grade</h2>
    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course_code">Course Code</label>
            <input type="text" class="form-control" id="course_code" name="course_code" value="{{ $grade->course_code }}" required>
        </div>
        <div class="form-group">
            <label for="course_title">Course Title</label>
            <input type="text" class="form-control" id="course_title" name="course_title" value="{{ $grade->course_title }}" required>
        </div>
        <div class="form-group">
            <label for="credit_hours">Credit Hours</label>
            <input type="number" class="form-control" id="credit_hours" name="credit_hours" value="{{ $grade->credit_hours }}" required>
        </div>
        <div class="form-group">
            <label for="term">Term</label>
            <input type="text" class="form-control" id="term" name="term" value="{{ $grade->term }}" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="number" class="form-control" id="grade" name="grade" value="{{ $grade->grade }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
