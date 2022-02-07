<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use stdClass;
use Exception;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->where('owner', Auth::user()->id)->get();
        return view('category')->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $owner = Auth::user()->id;
        DB::table('categories')->insert([
            'category_name' => $request->category_name,
            'owner' => $owner,
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        DB::table('categories')->where('id', $id)->update([
            'category_name' => $request->ucategory_name
        ]);

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        try{
            DB::table('categories')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success' => false]);
        }
    }

    public function show($id)
    {
        $products = Product::with('product_item')->where('category_id', $id)->get();
        $categories = Category::with('category_product')->get();        
        $maxprice = DB::table('items')->max('price');
        
        return view('front.categorydashboard')->with('products', $products)->with('categories', $categories)->with('maxprice', $maxprice);
    }

}
