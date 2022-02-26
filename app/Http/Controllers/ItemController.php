<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

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
        $isoname = $request->file('iso-upload')->getClientOriginalName();
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

            $isoPath = $request->file('item-upload');
            $isonameget = str_contains($isoname, '.svg') ? $id . '.svg' : $id . '.png';
            $isoPath->move(public_path('/app-assets/uploads/items/' . $product_id), $isonameget);
        }
        DB::table('items')->where('id', $id)->update([
            'item_img' => '/app-assets/uploads/items/' . $product_id . '/' . $isonameget,
            'iso' => '/app-assets/uploads/items/' . $product_id . '/' . $isonameget,
            'infos' => '/app-assets/uploads/items/' . $product_id . '/' . $isonameget,
        ]);

        $customers = DB::table('customers')->get();
        $mailcontents = DB::table('mailcontents')->get()[0];
        $price = $request->item_price;
        $size = $request->item_size;
        // foreach($customers as $customer){
        //     if ($customer->min_price < $price && $price < $customer->max_price && $size < $customer->max_size && $customer->min_size < $size ){

        //         $email = new \SendGrid\Mail\Mail();

        //         $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents->from);
        //         $email->setSubject($mailcontents->subject);
        //         $email->addTo($customer->email, "User");
        //         $email->addContent("text/plain", "Message");
        //         $email->addContent(
        //             "text/html", "<p> Hello " . $customer->name . "</p><p>".$mailcontents->content."</p>"
        //         );
        //         $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

        //         $response = $sendgrid->send($email);
        //     }
        // }

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $product_id = $request->product_id;
        $infonameget = $id . '.pdf';
        $customers = DB::table('customers')->get();
        $mailcontents = DB::table('mailcontents')->get()[0];

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

            foreach($customers as $customer){
                if ($customer->min_price < $request->item_price && $request->item_price < $customer->man_price && $request->item_total < $customer->max_size && $customer->min_size < $request->item_total ){
    
                    $email = new \SendGrid\Mail\Mail();
    
                    $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents->from);
                    $email->setSubject($mailcontents->subject);
                    $email->addTo($customer->email, "User");
                    $email->addContent("text/plain", "Message");
                    $email->addContent(
                        "text/html", "<p> Hello " . $customer->name . "</p><p>".$mailcontents->content."</p>"
                    );
                    $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
    
                    $response = $sendgrid->send($email);
                }
            }

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

            foreach($customers as $customer){
                if ($customer->min_price < $request->item_price && $request->item_price < $customer->man_price && $request->item_total < $customer->max_size && $customer->min_size < $request->item_total ){
    
                    $email = new \SendGrid\Mail\Mail();
    
                    $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents->from);
                    $email->setSubject($mailcontents->subject);
                    $email->addTo($customer->email, "User");
                    $email->addContent("text/plain", "Message");
                    $email->addContent(
                        "text/html", "<p> Hello " . $customer->name . "</p><p>".$mailcontents->content."</p>"
                    );
                    $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
    
                    $response = $sendgrid->send($email);
                }
            }

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

            foreach($customers as $customer){
                if ($customer->min_price < $request->item_price && $request->item_price < $customer->man_price && $request->item_total < $customer->max_size && $customer->min_size < $request->item_total ){
    
                    $email = new \SendGrid\Mail\Mail();
    
                    $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents->from);
                    $email->setSubject($mailcontents->subject);
                    $email->addTo($customer->email, "User");
                    $email->addContent("text/plain", "Message");
                    $email->addContent(
                        "text/html", "<p> Hello " . $customer->name . "</p><p>".$mailcontents->content."</p>"
                    );
                    $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
    
                    $response = $sendgrid->send($email);
                }
            }

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

            foreach($customers as $customer){
                if ($customer->min_price < $request->item_price && $request->item_price < $customer->man_price && $request->item_total < $customer->max_size && $customer->min_size < $request->item_total ){
    
                    $email = new \SendGrid\Mail\Mail();
    
                    $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents->from);
                    $email->setSubject($mailcontents->subject);
                    $email->addTo($customer->email, "User");
                    $email->addContent("text/plain", "Message");
                    $email->addContent(
                        "text/html", "<p> Hello " . $customer->name . "</p><p>".$mailcontents->content."</p>"
                    );
                    $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
    
                    $response = $sendgrid->send($email);
                }
            }

            return response()->json(['success' => true]);
        }

    }

    public function delete($id)
    {
        $items = DB::table('items')->where('id', $id)->get();
        try{
            foreach($items as $item){
                unlink('.'.$item->item_img);
                unlink('.'.$item->infos);
            }
            DB::table('items')->where('id', $id)->delete();
        }
        catch(Exception $e){
            DB::table('items')->where('id', $id)->delete();
        }
        
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
