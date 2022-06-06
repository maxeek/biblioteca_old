<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Illuminate\Http\Request;

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
        $userBooks = UserBook::paginate();

        return view('user-book.index', compact('userBooks'))
            ->with('i', (request()->input('page', 1) - 1) * $userBooks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userBook = new UserBook();
        return view('user-book.create', compact('userBook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserBook::$rules);

        $userBook = UserBook::create($request->all());

        return redirect()->route('user-books.index')
            ->with('success', 'UserBook created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userBook = UserBook::find($id);

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
        $userBook = UserBook::find($id);

        return view('user-book.edit', compact('userBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserBook $userBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserBook $userBook)
    {
        request()->validate(UserBook::$rules);

        $userBook->update($request->all());

        return redirect()->route('user-books.index')
            ->with('success', 'UserBook updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userBook = UserBook::find($id)->delete();

        return redirect()->route('user-books.index')
            ->with('success', 'UserBook deleted successfully');
    }
}
