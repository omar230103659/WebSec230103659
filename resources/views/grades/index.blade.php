@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Grades</h1>
        <a href="{{ route('grades.create') }}" class="btn btn-primary">Add New Grade</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Credit Hours</th>
                    <th>Term</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $grade->course_title }}</td>
                        <td>{{ $grade->credit_hours }}</td>
                        <td>{{ $grade->term }}</td>
                        <td>{{ $grade->grade }}</td>
                        <td>
                            <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
