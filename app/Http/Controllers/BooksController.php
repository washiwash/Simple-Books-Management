<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::query()->latest()->get();

        return view('addBooks', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:2048'],
        ]);

        $validated['image'] = $request->file('image')->store('books', 'public');

        Books::create($validated);

        return redirect()->route('books')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:2048'],
        ]);

        $books->title = $validated['title'];

        if ($request->hasFile('image')) {
            if (!empty($books->image)) {
                Storage::disk('public')->delete($books->image);
            }

            $books->image = $request->file('image')->store('books', 'public');
        }

        $books->save();

        return redirect()->route('books')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        if (!empty($books->image)) {
            Storage::disk('public')->delete($books->image);
        }

        $books->delete();

        return redirect()->route('books')->with('success', 'Book deleted successfully.');
    }
}
