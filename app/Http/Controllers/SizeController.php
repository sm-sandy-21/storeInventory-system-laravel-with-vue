<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::orderby('created_at','desc')->get();
        return view('Size.sizesIndex',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sizeName' => 'min:1|max:50|unique:sizes'
        ]);

        $size = new Size();
        $size->sizeName = $request->sizeName;
        $size->save();

        toast('Add size successfuly','success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sizes = Size::findOrFail($id);
        return view('Size.editSize',compact('sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'sizeName' => 'min:1|max:50|unique:sizes,sizeName,'. $id
        ]);

        $size = Size::findOrFail($id);

        $size->sizeName = $request->name;
        $size->update();

        toast('Add size successfuly Update','success');

        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sizes = Size::findOrFail($id);
        $sizes->delete();
      
     toast('sizes Delete successfuly','success');

        return redirect()->route('sizes.index');
    }
    
}
