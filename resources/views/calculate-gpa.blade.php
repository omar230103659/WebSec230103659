@extends('layouts.master')

@section('title', 'calculate GPA')

@section('content')
    <div class="container mt-5">
        <h2>Calculate GPA</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Title</th>
                    <th>Credit Hours</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody id="courseTable">
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course['code'] }}</td>
                    <td>{{ $course['title'] }}</td>
                    <td class="credit">{{ $course['credit'] }}</td>
                    <td>
                        <input type="number" class="form-control grade" min="0" max="100">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary" onclick="calculateGPA()">Calculate GPA</button>
        <h3 class="mt-3">Your GPA: <span id="gpaResult">-</span></h3>
    </div>

    <script>
        function calculateGPA() {
            let grades = document.querySelectorAll('.grade');
            let credits = document.querySelectorAll('.credit');
            let totalPoints = 0, totalCredits = 0;

            grades.forEach((grade, index) => {
                let g = parseFloat(grade.value) || 0;
                let credit = parseFloat(credits[index].textContent) || 0;
                totalPoints += (g / 20) * credit;
                totalCredits += credit;
            });

            let gpa = totalCredits ? (totalPoints / totalCredits).toFixed(2) : 0;
            document.getElementById('gpaResult').textContent = gpa;
        }
    </script>
@endsection