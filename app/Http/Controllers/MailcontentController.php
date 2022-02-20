<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class MailcontentController extends Controller
{

    public function index()
    {
        $mailcontents = DB::table('mailcontents')->get();
        if(count($mailcontents) == 0){
            return view('mailcontent')->with('from', '')->with('subject', '')->with('content', '')->with('id', '');
        }
        else{
            $id = $mailcontents[0]->id;
            $from = $mailcontents[0]->from;
            $subject = $mailcontents[0]->subject;
            $content = $mailcontents[0]->content;
            return view('mailcontent')->with('from', $from)->with('subject', $subject)->with('content', $content)->with('id', $id);
        }
        
    }
    public function create(Request $request)
    {
        DB::table('mailcontents')->insert([
            'from' => $request->from,
            'subject' => $request->subject,
            'content' => $request->content
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        
        DB::table('mailcontents')->where('id', $id)->update([
            'from' => $request->from,
            'subject' => $request->subject,
            'content' => $request->content
        ]);

        return response()->json(['success' => true]);
    }

}
