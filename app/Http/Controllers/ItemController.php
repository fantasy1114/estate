<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{

    public function index($product)
    {
        $items = DB::table('items')->where('product_id', $product)->get();
        return view('item')->with('items', $items);
    }

    public function create(Request $request)
    {
        $product_id = $request->product_id;
        $filename = $request->file('item-upload')->getClientOriginalName();
        DB::table('items')->insert([
            'product_id' => $product_id,
            'floor' => $request->item_floor,
            'apt' => $request->item_apt,
            'room' => $request->item_room,
            'total' => $request->item_total,
            'balcony' => $request->item_balcony,
            'rent' => $request->item_rent,
            'price' => $request->item_price
        ]);
        $id = DB::getPdo()->lastInsertId();
        if ($request->file('item-upload')) {
            $imagePath = $request->file('item-upload');
            $imagenameget = str_contains($filename, '.svg') ? $id . '.svg' : $id . '.png';
            $imagePath->move(public_path('/app-assets/uploads/items/' . $product_id), $imagenameget);

            $infoPath = $request->file('item-upload-pdf');
            $infonameget = $id . '.pdf';
            $infoPath->move(public_path('/app-assets/uploads/items/' . $product_id), $infonameget);
        }
        DB::table('items')->where('id', $id)->update([
            'item_img' => '/app-assets/uploads/items/' . $product_id . '/' . $imagenameget,
            'infos' => '/app-assets/uploads/items/' . $product_id . '/' . $infonameget,

        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $product_id = $request->product_id;
        $infonameget = $id . '.pdf';
        if ($request->file('uitem-upload') && $request->file('uitem-upload-pdf')) {
            $filename = $request->file('uitem-upload')->getClientOriginalName();
            $imagenameget = str_contains($filename, '.svg') ? $id . '.svg' : $id . '.png';
            $imagePath = $request->file('uitem-upload');
            $imagePath->move(public_path('/app-assets/uploads/items/' . $product_id), $imagenameget);

            $infoPath = $request->file('uitem-upload-pdf');
            
            $infoPath->move(public_path('/app-assets/uploads/items/' . $product_id), $infonameget);

            DB::table('items')->where('id', $id)->update([
                'item_img' => '/app-assets/uploads/items/' . $product_id . '/' . $imagenameget,
                'product_id' => $product_id,
                'floor' => $request->uitem_floor,
                'apt' => $request->uitem_apt,
                'room' => $request->uitem_room,
                'total' => $request->uitem_total,
                'balcony' => $request->uitem_balcony,
                'rent' => $request->uitem_rent,
                'price' => $request->uitem_price,
                'infos' => '/app-assets/uploads/items/' . $product_id . '/' . $infonameget
            ]);

            return response()->json(['success' => true]);
        }
        else if($request->file('uitem-upload')){
            $filename = $request->file('uitem-upload')->getClientOriginalName();
            $imagenameget = str_contains($filename, '.svg') ? $id . '.svg' : $id . '.png';

            $imagePath = $request->file('uitem-upload');
            $imagePath->move(public_path('/app-assets/uploads/items/' . $product_id), $imagenameget);

            DB::table('items')->where('id', $id)->update([
                'item_img' => '/app-assets/uploads/items/' . $product_id . '/' . $imagenameget,
                'product_id' => $product_id,
                'floor' => $request->uitem_floor,
                'apt' => $request->uitem_apt,
                'room' => $request->uitem_room,
                'total' => $request->uitem_total,
                'balcony' => $request->uitem_balcony,
                'rent' => $request->uitem_rent,
                'price' => $request->uitem_price,
            ]);

            return response()->json(['success' => true]);
        }

        else if($request->file('uitem-upload-pdf')){
            $infoPath = $request->file('uitem-upload-pdf');
            $infonameget = $id . '.pdf';
            $infoPath->move(public_path('/app-assets/uploads/items/' . $product_id), $infonameget);

            DB::table('items')->where('id', $id)->update([
                'product_id' => $product_id,
                'floor' => $request->uitem_floor,
                'apt' => $request->uitem_apt,
                'room' => $request->uitem_room,
                'total' => $request->uitem_total,
                'balcony' => $request->uitem_balcony,
                'rent' => $request->uitem_rent,
                'price' => $request->uitem_price,
                'infos' => '/app-assets/uploads/items/' . $product_id . '/' . $infonameget
            ]);

            return response()->json(['success' => true]);
        }
        else{
            DB::table('items')->where('id', $id)->update([
                'product_id' => $product_id,
                'floor' => $request->uitem_floor,
                'apt' => $request->uitem_apt,
                'room' => $request->uitem_room,
                'total' => $request->uitem_total,
                'balcony' => $request->uitem_balcony,
                'rent' => $request->uitem_rent,
                'price' => $request->uitem_price,
            ]);

            return response()->json(['success' => true]);
        }
    }

    public function delete($id)
    {
        $items = DB::table('items')->where('id', $id)->get();
        foreach($items as $item){
            unlink('.'.$item->item_img);
            unlink('.'.$item->infos);
        }
        DB::table('items')->where('id', $id)->delete();
        return response()->json(['success'=>true]);
    }

    public function favourite($id)
    {
        $items = DB::table('items')->where('id', $id)->get();
        foreach($items as $item){
            $item->favourite == 'on' ? DB::table('items')->where('id', $id)->update(['favourite' => 'off' ]) : DB::table('items')->where('id', $id)->update(['favourite' => 'on' ]);
        }
        return response()->json(['success'=>true]);
    }
}
