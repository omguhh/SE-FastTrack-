<?php namespace App\Http\Controllers;

class PageController extends Controller {




    public function index()
    {


        return 'Welcome to my website';
    }

    public function about()
    {

        $first = 'Fox';
        $second = 'Mudler';
        $lessons  = ['lesson 1','lesson 2','lesson 3'];

        return view('home', ['lessons' => $lessons]);
        //return view('home', compact('first','second'));
    }

    public function contact()
    {


        return view('pages.contact');
    }

}
