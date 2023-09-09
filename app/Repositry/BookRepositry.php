<?php

namespace App\Repositry;

use App\Interfaces\BookRepositryInterface;
use App\Models\Book;
use App\Models\SchoolGrade;
use App\Models\Term;
use Exception;
use Illuminate\Support\Facades\Storage;

class BookRepositry implements BookRepositryInterface
{
    public function index()
    {
        $books = Book::get();
        return view('Books.index', compact('books'));
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $file_name = "./uploades/books/$id/$book->file_name";
        return response()->download($file_name, $book->file_name);
    }
    public function create()
    {
        $grades = SchoolGrade::all();
        $terms = Term::get();
        return view('Books.create', compact('grades', 'terms'));
    }
    public function store($request)
    {
        try {
            $file_name = $request->file('file_name')->getClientOriginalName();
            Book::create([
                'file_name' => $file_name,
                'school_grade_id' => $request->school_grade_id,
                'classe_id' => $request->classe_id,
                'subject_id' => $request->subject_id,
                'term_id' => $request->term_id,
                'academic_year' => $request->academic_year
            ]);
            $id = Book::latest()->first()->id;
            $request->file('file_name')->storeAs('', "$id/$file_name", 'books');
            return redirect()->route('books.index')->with('save', 2);
        } catch (Exception $e) {
            return redirect()->back()->with('errsyn', $e->getMessage());
        }
    }
    public function edite($id)
    {
        $grades = SchoolGrade::all();
        $terms = Term::get();
        $book = Book::findOrFail($id);
        return view('Books.edite', compact('book', 'grades', 'terms'));
    }
    public function update($request, $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->update([
                'school_grade_id' => $request->school_grade_id,
                'classe_id' => $request->classe_id,
                'subject_id' => $request->subject_id,
                'term_id' => $request->term_id,
                'academic_year' => $request->academic_year
            ]);
            if ($request->hasFile('file_name')) {
                Storage::disk('books')->delete("/$id/$book->file_name");
                $file_name = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $file_name;
                $book->save();
                $request->file('file_name')->storeAs('', "$book->id/$file_name", 'books');
            }
            return redirect()->route('books.index')->with('update', 2);
        } catch (Exception $e) {
            return redirect()->back()->with('errsyn', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return redirect()->route('books.index')->with('delete', 2);
        } catch (Exception $e) {
            return redirect()->back()->with('errsyn', $e->getMessage());
        }
    }
}
