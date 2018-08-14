<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Notification;
use App\Attachment;

use Auth;
use URL;
use Image;

class AttachmentController extends Controller
{

    public function index(Request $request)
    {
      $attachments = Attachment::all();
      return view('admin.attachments.index', compact('attachments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'upload' => 'required|mimes:jpeg,bmp,png,doc,docx,pdf,xls,xlsx,csv'
      ]);
      $filename = str_slug(explode('.', $request->file('upload')->getClientOriginalName())[0]).'.'.$request->file('upload')->getClientOriginalExtension();
      if(Attachment::where('user_id', Auth::user()->id)->where('name', $filename)->first()) {
        $filename = str_slug(explode('.', $request->file('upload')->getClientOriginalName())[0]).rand(10000,99999).'.'.$request->file('upload')->getClientOriginalExtension();
      }
      //Create thumbnail
      Image::make($request->file('upload'))->save('uploads/'.Auth::user()->id.'/'.$filename);
      Image::make($request->file('upload'))->widen(300)->save('uploads/'.Auth::user()->id.'/thumb-'.$filename);

      $attachment = new Attachment;
      $attachment->user_id = Auth::user()->id;
      $attachment->name = $filename;
      $attachment->file = $filename;
      $attachment->size = $request->file('upload')->getClientSize();
      $attachment->path = '/uploads/'.Auth::user()->id.'/'.$filename;
      $attachment->thumbnail = '/uploads/'.Auth::user()->id.'/thumb-'.$filename;
      $attachment->save();
      return response()->json([
        'uploaded' => 1,
        'fileName' => $filename,
        'url' => '/uploads/'.Auth::user()->id.'/'.$filename
      ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
