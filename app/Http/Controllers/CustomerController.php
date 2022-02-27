<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{

    public function index()
    {
        $customers = DB::table('customers')->get();
        return view('customer')->with('customers', $customers);
    }

    public function create(Request $request)
    {
        DB::table('customers')->insert([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'phone' => $request->customer_phone,
            'min_price' => $request->customer_min_price,
            'max_price' => $request->customer_max_price,
            'min_size' => $request->customer_min_size,
            'max_size' => $request->customer_max_size,
            'region' => $request->customer_region
        ]);

        $finding_estates = DB::table('items')->whereBetween('price', [$request->customer_min_price, $request->customer_max_price])->whereBetween('total', [$request->customer_min_size, $request->customer_max_size])->get();
        if(count($finding_estates) == 0){
            return response()->json(['success' => true]);
        }
        else{
            $mailcontents = DB::table('mailcontents')->get()[0];

            $email = new \SendGrid\Mail\Mail();

            $email->setFrom(env('SENDGRID_SENDER_MAIL'), $mailcontents->from);
            $email->setSubject($mailcontents->subject);
            $email->addTo($request->customer_email, "User");
            $email->addContent("text/plain", "Message");
            $email->addContent(
                "text/html", "<p> Hello " . $request->customer_name . "</p><p>".$mailcontents->content."</p>"
            );
            $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));

            $response = $sendgrid->send($email);
            return response()->json(['success' => true]);
        }
    
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
            'max_size' => $request->ucustomer_max_size,
            'region' => $request->ucustomer_region,
        ]);

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return response()->json(['success'=>true]);
    }


}
