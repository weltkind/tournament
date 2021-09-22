<?php

namespace App\Http\Controllers;

use App\Events\BeginEvent;
use App\Kingdom\Book;
use App\Kingdom\ChurchBook;
use App\Kingdom\Court;
use App\Kingdom\Messenger;
use App\Kingdom\Tournament;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function intro(Request $request)
    {
        event(new BeginEvent());

        return view('intro', ['intro' => $this->book->read(), 'error' => $request->get('error')]);
    }

    public function tournament(Request $request)
    {
        $messenger = new Messenger((int)$request->get('amount'), new ChurchBook());
        $tournament = new Tournament(new Court($messenger->invite()));
        $tournament->run();

        return view('tournament', ['story' => $this->book->read()]);
    }
}
