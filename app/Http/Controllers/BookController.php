<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lease;
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




            $books = Book::with('author', 'categ')
            ->orderBy('inventory');



            return Datatables::of($books)

                    ->addIndexColumn()

                ->addColumn('autor', function ($books) {
                // return ('Klimavicius');
                return [($books->author->name). " " . ($books->author->surname)];
            })
                    ->addColumn('action', function($books){


                        $ids=$books->id;
                        if ($books->condition === 1) {
                                                    return '<a href="books/' .  $ids . '" class="btn btn-primary mr-2">Mostrar</a>' . '<a href="books/' .  $ids . '/edit " class="btn btn-success mr-2">Editar</a>' . '<a href="aprestar/' .  $ids . '"class="btn btn-warning mr-2">Prestar</a>' ;

                        } else {

                            return '<a href="books/' .  $ids . '" class="btn btn-primary mr-2">Mostrar</a>' . '<a href="books/' .  $ids . '/edit " class="btn btn-success mr-2">Editar</a>' . '<a href="adevolver/' .  $ids . '"class="btn btn-outline-danger mr-2">Devolver</a>' ;

                        }


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


            $buscaridlease = Lease::where('book_id', $id)
            ->first();

            // asocio desde la variable encontrado, el id de la tabla Leaase si la encuntra


            $encontrado=$buscaridlease->id;

            //En la variable datoslease busco el id del registro donde se guardan los datos
            // de la persona (book_user_id) y del libro (book_id) para luego
            // concatenar los datos del usuario (nombre->name) y (apellido->surname) desde
            // la vista return.blade.php


                    $datoslease = Lease::find($encontrado);


            // todos los datos recolectados los llevo al return.blade.php




















        return view('book.show', compact('book', 'datoslease'));
    }

  /** Prestar
 */
//     public function lend($id)
//     {
//         $book = Book::find($id);
// $usersbook = User_book::orderBy('surname')->get();
//         return view('book.lend ', compact('book'),  ['usersbook' => $usersbook]);
//     }



    /*
lend update actualiza los datos en la condicion de libro y ademas
crea un nuevo registro en la tabla lease con el id del libro y el id
del usuario. tabien la fecha del prestamo.


    */

    // public function lendupdate(Request $request, Book $id)
    // {


    //     // $book->update($request->all());

    //        $book=Book::find($id);
    //     //    $userbook=User_book::find($id);

    //     $book->condition = $request->get('prestado');


    //     // $prestado=0;

    //     // $book->condition = $prestado;
    //     $book->save();

    // // $prestamo= new Lease();
    // //     $prestamo->book_id = $request->get('book_id_del_form');
    // //     $prestamo->user_book_id = $request->get('user_id_del_form');

    //     return redirect()
    //         ->route('books.index')
    //         ->with('success', 'Libro prestado exitosamente a fulano.');
    // }
    /**
     *




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
            ->with('success', 'Elimiando exitosamente!');
    }
}
