<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Carbon\Carbon;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.faq.index',[
            'faqs' => Faq::latest()->get()
        ]);
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
        $request->validate([
            'faq_qu'              => 'required',
            'faq_ans'             => 'required',
        ]);

        Faq::insert([
            'faq_qu'          => $request->faq_qu,
            'faq_ans'         => $request->faq_ans,
            'created_at'      => carbon::now()
        ]);

          $notification=array(
            'message'=>'Faq Insert successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
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
        return view('admin.Faq.edit',[
            'edit_data' => Faq::findOrFail($id),
             ]);
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
            'faq_qu'              => 'required',
            'faq_ans'             => 'required',
        ]);

        Faq::findOrFail($id)->update([
            'faq_qu'           => $request->faq_qu,
            'faq_ans'          => $request->faq_ans,
            'updated_at'       => carbon::now()
        ]); 

          $notification=array(
            'message'=>'Faq Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('faq.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {

        Faq::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Faq Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function faqinactive($id)
    {
        Faq::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Faq Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function faqactive($id)
    {
        Faq::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Faq Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
