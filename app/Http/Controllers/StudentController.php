<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display a list of students
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = trim($request->input('search'));
            $minAge = $request->input('minAge');
            $maxAge = $request->input('maxAge');

            $students = Student::query();

            // Apply the search filter
            if (!empty($query)) {
                $students->where('name', 'LIKE', "%{$query}%");
            }

            // Apply the age range filter
            if (!empty($minAge) && !empty($maxAge)) {
                $students->whereBetween('age', [$minAge, $maxAge]);
            }

            return response()->json($students->get(), 200);
        }
    
        // For regular requests (non-AJAX), return the view
        $students = Student::query();
        
        if ($request->has('search')) {
            $query = trim($request->input('search'));
            $students->where('name', 'LIKE', "%{$query}%");
        }

        if ($request->has('minAge') && $request->has('maxAge')) {
            $minAge = $request->input('minAge');
            $maxAge = $request->input('maxAge');
            $students->whereBetween('age', [$minAge, $maxAge]);
        }

        return view('index', ['students' => $students->get()]);
    
    }

    // Show the form to create a new student
    public function create()
    {
        return view('create');
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age'  => 'required|integer|min:1|max:100',
        ]);

        Student::create([
            'name' => $request->name,
            'age'  => $request->age,
        ]);

        return redirect()->route('students.index');
    }

    public function show($id) {
        $student = Student::findOrFail($id);
        return view('show', compact('student'));
    }
    public function edit($id) {
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));

    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
        ]);
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'age' => $request->age,
        ]);
        return redirect()->route('students.index');

    }
    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
