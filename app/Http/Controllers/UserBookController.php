<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserBookRequest;



use Illuminate\Http\Request;

use App\Models\User_book;





/**
 * Class UserBookController
 * @package App\Http\Controllers
 */
class UserBookController extends Controller
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


         $userBooks=User_book::all();
        return view('user-book.index', compact('userBooks'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {




        $userBook = new User_book();
        return view('user-book.create', compact('userBook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserBookRequest $request)
    {
        //  request()->validate(User_book::$rules);

        // $userBook = User_book::create($request->all());

        // return redirect()->route('users-book.index')
        //     ->with('success', 'Usuario de biblioteca ingresado con éxito!!!');

        $userBook = new User_book();

        $userBook->dni = $request->get('dni');
        $userBook->surname = $request->get('surname');
        $userBook->name = $request->get('name');
        $userBook->save();

        return redirect()->route('users-book.index')
            ->with('success', 'Usuario de biblioteca ingresado con éxito!!!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $userBook = User_book::find($id);

        return view('user-book.show', compact('userBook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userBook = User_book::find($id);

        return view('user-book.edit', compact('userBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserBook $userBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_book $userBook)
    {
        request()->validate(User_book::$rules);

        $userBook->update($request->all());

        return redirect()->route('users-book.index')
            ->with('success', 'UserBook updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userBook = User_book::find($id)->delete();

        return redirect()->route('users-book.index')
            ->with('success', 'Usuario eliminado con éxtito!!!');
    }
}
