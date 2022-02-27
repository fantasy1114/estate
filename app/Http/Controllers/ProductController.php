<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('product_category')->where('owner', Auth::user()->id)->get();
        $categories = DB::table('categories')->where('owner', Auth::user()->id)->get();
        return view('product')->with('products', $products)->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $filename = $request->file('product-upload')->getClientOriginalName();
        $owner = Auth::user()->id;
        DB::table('products')->insert([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'owner' => $owner,
        ]);
        $id = DB::getPdo()->lastInsertId();
        if ($request->file('product-upload')) {
            $imagePath = $request->file('product-upload');
            $imagenameget = str_contains($filename, '.svg') ? $id . '.svg' : $id . '.png';
            $imagePath->move(public_path('/app-assets/uploads/products/' . $owner), $imagenameget);
        }
        DB::table('products')->where('id', $id)->update([
            'product_img' => '/app-assets/uploads/products/' . $owner . '/' . $imagenameget,
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        
        $default_values = DB::table('products')->where('id', $id)->get();
        foreach ($default_values as $default_value) {
            $owner = $default_value->owner;
        }
        
        if ($request->file('uproduct-upload')) {
            $filename = $request->file('uproduct-upload')->getClientOriginalName();
            $imagenameget = str_contains($filename, '.svg') ? $id . '.svg' : $id . '.png';
            $imagePath = $request->file('uproduct-upload');
            $imagePath->move(public_path('/app-assets/uploads/products/' . $owner), $imagenameget);

            DB::table('products')->where('id', $id)->update([
                'product_name' => $request->uproduct_name,
                'category_id' => $request->ucategory_id,
                'product_img' => '/app-assets/uploads/products/' . $owner . '/' . $imagenameget,
            ]);

            return response()->json(['success' => true]);
        }
        else{
            DB::table('products')->where('id', $id)->update([
                'product_name' => $request->uproduct_name,
                'category_id' => $request->ucategory_id,
            ]);

            return response()->json(['success' => true]);
        }
          
    }

    public function delete($id)
    {
        try{
            $products = DB::table('products')->where('id', $id)->get();
            
            foreach($products as $product){
                unlink($product->product_img);                
            }
            DB::table('products')->where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }
        catch (Exception $e) {
            try{
                DB::table('products')->where('id', $id)->delete();
                return response()->json(['success'=>true]);
            }
            catch (Exception $e) {
                return response()->json(['success'=>false]);
            }
            
        }
       
    }

    public function show($id)
    {
        $pid = DB::table('products')->where('id', $id)->get()[0]->category_id;
        $product_name = DB::table('products')->where('id', $id)->get()[0]->product_name;
        $category_id = DB::table('products')->where('id', $id)->get()[0]->category_id;
        $product_img = DB::table('products')->where('id', $id)->get()[0]->product_img;
        $isometry = DB::table('products')->where('id', $id)->get()[0]->isometry;
        $products = DB::table('products')->where('category_id', $pid)->get();
        $allproducts = DB::table('products')->get();
        $categories = Category::with('category_product')->get();
        $items = DB::table('items')->where('product_id', $id)->get();
        $maxprice = DB::table('items')->max('price');
        
        return view('front.dashboard')->with('products', $products)->with('items', $items)->with('allproducts', $allproducts)->with('categories', $categories)->with('maxprice', $maxprice)->with('product_name', $product_name)->with('category_id', $category_id)->with('product_img', $product_img)->with('isometry', $isometry);
        
    }

    public function change($id)
    {
        $products = DB::table('products')->where('id', $id)->get();
        foreach($products as $product){
            $isometry =  $product->isometry;

            DB::table('products')->where('id', $id)->update([
                'isometry' => $isometry == '1' ? '0' : '1'
            ]);
        }

        return response()->json(['success' => true]);;
    }

    public function application($id)
    {
        $items = DB::table('items')->where('id', $id)->get();
        return view('front.application')->with('items', $items);
    }

    public function favourite()
    {
        $products = DB::table('products')->get();
        $allproducts = DB::table('products')->get();
        $categories = Category::with('category_product')->get();
        $maxprice = DB::table('items')->max('price');
        $items = DB::table('items')->where('favourite', 'on')->get();

        return view('front.favourite')->with('products', $products)->with('items', $items)->with('allproducts', $allproducts)->with('categories', $categories)->with('maxprice', $maxprice);
        
    }

}
