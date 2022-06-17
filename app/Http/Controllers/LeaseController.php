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


//
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

        $book = Book::find($id);
        $usersbook = User_book::orderBy('surname')->get();
        return view('lend.return ', compact('book'),  ['usersbook' => $usersbook]);
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
        $book = Book::find($id);
        $usersbook = User_book::orderBy('surname')->get();
        return view('lend.return ', compact('book'),  ['usersbook' => $usersbook]);
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
        $cero=5;
                $book=Book::find($id);
                 $book->condition =  $request->get('condition');
                $book->save();

                return redirect()
            ->route('books.index')
            ->with('success', 'Libro prestado exitosamente a fulano.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
