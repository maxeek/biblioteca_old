<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::orderBy('title')->paginate();

        // return view('book.index', compact('books'))
        //     ->with('author:id,surname,name')
        //     ->with('category:id,name')
        //     ->with('i', (request()->input('page', 1) - 1) * $books->perPage());

        $books = Book::all();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('surname')->get();
        $book = new Book();
        //     return view('book.create', compact('book')
        // ->with('author:id,surname,name'));

        return view('book.create', compact('book'), ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Book::$rules);

        $book = Book::create($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        request()->validate(Book::$rules);

        $book->update($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Libro modificado exitosamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $book = Book::find($id)->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
