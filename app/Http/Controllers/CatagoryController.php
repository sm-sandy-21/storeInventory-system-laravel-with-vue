<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::orderby('created_at','desc')->get();
        return view('catagories.catagoryIndex',compact('catagories'));
    }     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('catagories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
       
        $this->validate($request,[
            'catagoryName' => 'min:2|max:50|unique:catagories'
        ]);

        // $catagory = new Catagory();
        // $catagory->catagoryName = $request->catagoryName;
        // $catagory->save();

        $Catagory = Catagory::create(
           $request->all()
          
        );


         //realrashid/sweet-alert   https://realrashid.github.io/sweet-alert/install


      //  alert()->success('Add Catagory','Add Catagory successfuly');
        toast('Add Catagory successfuly','success');
        //Alert::success('Add Catagory successfuly');
        //flash('Add Catagory successfuly')->success();
        
         return back();

    }

    /**
     * Display the specified resource.
     *
      * @param  \App\Models\Catagory  $catagory
      * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Catagories = Catagory::findOrFail($id);
        return view('catagories.editCatagory',compact('Catagories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $this->validate($request,[
            'catagoryName' => 'min:2|max:50|unique:catagories,catagoryName,'. $id
        ]);

        $catagory = Catagory::findOrFail($id);

        $catagory->catagoryName = $request->name;
        $catagory->update();

        toast('Add Catagory successfuly Update','success');

        return redirect()->route('catagories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    
    $catagory = Catagory::findOrFail($id);
    $catagory->delete();
      
     toast('Catagory Delete successfuly','success');

        return redirect()->route('catagories.index');
    }


    //Handle Ajax Request

    public function getCatagoriesJson(){
        $catagories = Catagory::all();

        return response()->json([
            'success' => true,
            'data' => $catagories
        ],Response::HTTP_OK);
    }
}
