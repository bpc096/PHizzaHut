<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use Session;
use DB;

class WelcomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

     /**
     * Create a new controller instance.
     *
     * @return Response
     */

    public function index(Request $request)
    {
        // Fungsi index untuk menampilkan data pizza di website
       
        $pizzas = Pizza::paginate(6);
        return view('guest.welcome', compact('pizzas'));
       
    }

    // Fungsi search dan mencari data pizza di website
    public function search()
    {
        $search_pizza = $_GET['search'];
        $pizzas = Pizza::where('pizza_name', 'LIKE', '%'.$search_pizza.'%')->get();

        return view('guest.search', compact('pizzas'));
    }
}
