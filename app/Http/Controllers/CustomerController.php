<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = DB::table('customers')->where('owner', Auth::user()->id)->get();
        return view('customer')->with('customers', $customers);
    }

    public function create(Request $request)
    {
        $owner = Auth::user()->id;
        DB::table('customers')->insert([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'phone' => $request->customer_phone,
            'min_price' => $request->customer_min_price,
            'max_price' => $request->customer_max_price,
            'min_size' => $request->customer_min_size,
            'max_size' => $request->customer_max_size,
            'owner' => $owner,
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        
        DB::table('customers')->where('id', $id)->update([
            'name' => $request->ucustomer_name,
            'email' => $request->ucustomer_email,
            'phone' => $request->ucustomer_phone,
            'min_price' => $request->ucustomer_min_price,
            'max_price' => $request->ucustomer_max_price,
            'min_size' => $request->ucustomer_min_size,
            'max_size' => $request->ucustomer_max_size
        ]);

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return response()->json(['success'=>true]);
    }


}
