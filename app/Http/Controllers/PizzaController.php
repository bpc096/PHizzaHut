<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pizza;
use DB;

class PizzaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_user($id)
    {
        $pizza = Pizza::where('id', $id)->first();
        return view('pizzadetail.indexuser', compact('pizza'));

    }

    public function index_guest($id)
    {
        $pizz = Pizza::where('id', $id)->first();
        return view('pizzadetail.indexguest', compact('pizz'));

    }

    public function index_admin($id)
    {
        $pizzaa = Pizza::where('id', $id)->first();
        return view('pizzadetail.indexadmin', compact('pizzaa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // Fungsi Menyimpan data pizza ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'pizza_name' => 'required|string|max:20',
            'pizza_price' => 'required|integer|min:10000',
            'pizza_description' => 'required|string|min:20',
            'pizza_image' => 'required|image'
        ]);

        $img = $request['pizza_image'];
        $ext = strtolower($img->getClientOriginalName());
        $img->move('img', $ext);

        $pizza = new Pizza();

        $pizza->pizza_name = $request->pizza_name;
        $pizza->pizza_price = $request->pizza_price;
        $pizza->pizza_description = $request->pizza_description;
        $pizza->pizza_image = "../img/".$ext;

        $pizza->save();
        
        return redirect('/admin')->with('success', 'Pizza Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        return view('admin.edit', compact('pizza'));
    }

    public function delete($id)
    {
        $pizza = Pizza::find($id);
        return view('admin.delete', compact('pizza'));
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
        $request->validate([
            'pizza_name' => 'required|string|max:20',
            'pizza_price' => 'required|integer|min:10000',
            'pizza_description' => 'required|string|min:20',
            'pizza_image' => 'required|image'
        ]);

        $img = $request['pizza_image'];
        $pizza = Pizza::find($id);
        
        if(empty($img))
        {
            $pizza->pizza_name = $request->pizza_name;
            $pizza->pizza_price = $request->pizza_price;
            $pizza->pizza_description = $request->pizza_description;
        }
        else 
        {
            //unlink($pizza->pizza_image);
            $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
            $file_delete =  "$base_dir/img/$img";
            if (file_exists($file_delete)) {unlink($file_delete);}
            
            $ext = strtolower($img->getClientOriginalName());

            $pizza->pizza_name = $request->pizza_name;
            $pizza->pizza_price = $request->pizza_price;
            $pizza->pizza_description = $request->pizza_description;
            $pizza->pizza_image = "../img/".$ext;
            
            $img->move('img', $ext);
        }
        
        $pizza->save();
        return redirect('/admin')->with('success', 'Pizza Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'Pizza Deleted Successfully!');
    }
}
