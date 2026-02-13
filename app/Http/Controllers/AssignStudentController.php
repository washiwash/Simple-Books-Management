<?php

namespace App\Http\Controllers;

use App\Models\AssignStudent;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AssignStudentController extends Controller
{
    public function index()
    {
        $students = User::query()
            ->where('role', 'user')
            ->orderBy('name')
            ->with(['books' => function ($query) {
                $query->orderBy('title');
            }])
            ->get();

        $books = Books::query()
            ->orderBy('title')
            ->get();

        return view('assignStudent', [
            'students' => $students,
            'books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where(fn ($query) => $query->where('role', 'user')),
            ],
            'book_id' => ['required', 'integer', 'exists:books,id'],
        ]);

        $assignment = AssignStudent::firstOrCreate([
            'user_id' => $validated['user_id'],
            'book_id' => $validated['book_id'],
        ]);

        if ($assignment->wasRecentlyCreated) {
            return redirect()->route('assignStudent')->with('success', 'Book assigned to student successfully.');
        }

        return redirect()->route('assignStudent')->with('success', 'This book is already assigned to that student.');
    }

    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')->where(fn ($query) => $query->where('role', 'user')),
            ],
            'book_id' => ['required', 'integer', 'exists:books,id'],
        ]);

        $student = User::findOrFail($validated['user_id']);
        $student->books()->detach($validated['book_id']);

        return redirect()->route('assignStudent')->with('success', 'Book unassigned successfully.');
    }
}
