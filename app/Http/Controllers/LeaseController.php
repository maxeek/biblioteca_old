<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lease;
use App\Models\User_book;
use Illuminate\Http\Request;

;

use Yajra\DataTables\Facades\DataTables;



class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prestados=Lease::all();
        return view('lend.index', compact('prestados'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function devolucion(Request $request, $id)
    {

        $cero=1;
                $book=Book::find($id);
                //  $book->condition = $request->get('apellido');
                 $book->condition = $cero;
                $book->save();

                return redirect()
            ->route('books.index')
            ->with('success', 'Libro prestado exitosamente a fulano.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paraprestar($id)
    {

        $book = Book::find($id);
        $usersbook = User_book::orderBy('surname')->get();
        return view('lend.lend ', compact('book'),  ['usersbook' => $usersbook]);
//
    }
     public function paradevolver($id)
    {
// Busco el libro que fue prestado
// este id lo voy a usar después para buscar el book_id de la tabla lease.

        $book = Book::find($id);


////  a los registros  de la tabla lease por el id de la tabla Book.
// busco el book_id Lease que esta relacionado con el id de la tabla Book





$buscaridlease = Lease::where('book_id', $id)
->first();

// asocio desde la variable encontrado, el id de la tabla Leaase


$encontrado=$buscaridlease->id;

//En la variable datoslease busco el id del registro donde se guardan los datos
// de la persona (book_user_id) y del libro (book_id) para luego
// concatenar los datos del usuario (nombre->name) y (apellido->surname) desde
// la vista return.blade.php


        $datoslease = Lease::find($encontrado);


// todos los datos recolectados los llevo al return.blade.php



        return view('lend.return ', compact('book', 'datoslease'));
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function return($id)
    {
        // $book = Book::find($id);
        // $usersbook = User_book::orderBy('surname')->get();
        // return view('lend.return ', compact('book'),  ['usersbook' => $usersbook]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if ( $request->get('condition')==0) {


        $book=Book::find($id);
        $book->condition =  $request->get('condition');
        $book->save();

    $lease = new Lease();
    $lease->book_id = $request->get('book_id');
    $lease->book_user_id = $request->get('usersbook');

    $lease->save();

        }
        else {
             $book=Book::find($id);
        $book->condition =  $request->get('condition');
        $book->save();

        Lease::where('book_id', '=', $id)->delete();


        //    return redirect()
        //     ->route('lends.destroy', $id);

        }











                return redirect()
            ->route('books.index');
            // ->with('success', 'Libro prestado exitosamente a fulano.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_id_lease=$id;

         $leasebook = Lease::find($book_id_lease)->delete();

           return redirect()
            ->route('books.index');
    }
}
