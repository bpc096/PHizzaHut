<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Fungsi index untuk menampilkan data pizza di website
       
        $pizzas = Pizza::paginate(6);
        return view('member.home', compact('pizzas'));
       
    }

    // Fungsi search dan mencari data pizza di website
    public function search()
    {
        $search_pizza = $_GET['search'];
        $pizzas = Pizza::where('pizza_name', 'LIKE', '%'.$search_pizza.'%')->get();

        return view('member.search', compact('pizzas'));
    }
}
