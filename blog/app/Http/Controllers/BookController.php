<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Redirect;

use App\Models\Models\ModelBook;
use App\Models\User;

class BookController extends Controller
{
    private $objUser;
    private $objBook;

    public function __construct(){
        $this->objUser=new User();
        $this->objBook=new ModelBook();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = $this->objBook->all();
        $books = $this->objBook->all()->sortBy('id'); //Odernação crescente (parametro) 
        // $books = $this->objBook->all()->sortByDesc('id'); //Odernação descrescente (parametro) 
        return view(view:'index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view(view:'create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = $this->objBook;
        $book = $book->create($request->all());

        if($book){
            return Redirect::to('books/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->objBook->find($id);
        $user = $book->find($book->id)->relUsers; 
        
        return view(view:'show')->with('book', $book)->with('user', $user);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $book = $this->objBook->find($id);
        $users = $this->objUser->all(); 
        return view(view: 'create')->with('book', $book)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $this->objBook->where(['id'=>$id])->update([
            'title'=>$request->title,
            'pages'=>$request->pages,
            'price'=>$request->price,
            'id_user'=>$request->id_user,
        ]);
        return Redirect::to('books/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $this->objBook->findOrFail($id)->delete();
        return Redirect::to('books/');
    }
}
