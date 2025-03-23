<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::orderBy('term')->get();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'course_code' => 'required|string',
            'course_title' => 'required|string',
            'credit_hours' => 'required|integer',
            'grade' => 'required|numeric',
            'term' => 'required|string',
            
        ]);

        // حفظ البيانات في قاعدة البيانات
        Grade::create($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }

    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'course_code' => 'required|string',
            'course_title' => 'required|string',
            'credit_hours' => 'required|integer',
            'grade' => 'required|numeric',
            'term' => 'required|string',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
