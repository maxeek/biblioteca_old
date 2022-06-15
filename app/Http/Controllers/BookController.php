<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User_book;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
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
    public function index(Request $request)

    {

        if ($request->ajax()) {


            ;

            $books = Book::with('author', 'categ')
            ->orderBy('title');



            return Datatables::of($books)

                    ->addIndexColumn()

                ->addColumn('autor', function ($books) {
                // return ('Klimavicius');
                return [($books->author->name). " " . ($books->author->surname)];
            })
                    ->addColumn('action', function($books){


                        $ids=$books->id;

                        return '<a href="books/' .  $ids . '" class="btn btn-primary mr-2">Mostrar</a>' . '<a href="books/' .  $ids . '/edit " class="btn btn-success mr-2">Editar</a>' . '<a href="books/' .  $ids . '/lend "class="btn btn-warning mr-2">Prestar</a>' ;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }


        return view('book.index');




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('surname')->get();
        $categories = Category::orderBy('name')->get();
        $book = new Book();
        //     return view('book.create', compact('book')
        // ->with('author:id,surname,name'));

        return view('book.create', compact('book'), ['authors' => $authors, 'categories'=> $categories] );
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

  /** Prestar
 */
    public function lend($id)
    {
        $book = Book::find($id);
$usersbook = User_book::orderBy('surname')->get();
        return view('book.lend ', compact('book'),  ['usersbook' => $usersbook]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $authors = Author::orderBy('surname')->get();

        $categories = Category::orderBy('name')->get();





        $book = Book::find($id);

        return view('book.edit', compact('book'), ['authors' => $authors, 'categories'=>$categories ]);



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
