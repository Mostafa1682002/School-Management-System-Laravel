<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;
use App\Interfaces\BookRepositryInterface;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $Book;

    public function __construct(BookRepositryInterface $book)
    {
        $this->Book = $book;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Book->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Book->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBook $request)
    {
        return $this->Book->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Book->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Book->edite($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBook $request, $id)
    {
        return $this->Book->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->Book->destroy($id);
    }
}
