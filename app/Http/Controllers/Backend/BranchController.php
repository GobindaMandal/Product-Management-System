<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view("backend.pages.branch.add");
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
            'br_name'=>'required',
            'br_manager'=>'required',
            'phone'=>'required'
        ]);

        $branch = new Branch;
        $branch->br_name =$request->br_name;
        $branch->br_manager =$request->br_manager;
        $branch->br_phone =$request->phone;
        $branch->br_email =$request->email;
        $branch->status =$request->status;
        $branch->save();
        return redirect()->route("branchshow")->with("majid","Branch Added Success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id){
        $find=Branch::find($id);
        if($find->status==1){
            $find->status="2";
        }
        else{
            $find->status="1";
        }
        $find->update();
        return redirect()->route("branchshow")->with("majid","Status Update Success");
    }
    public function show()
    {
        $branch = Branch::all();
        return view("backend.pages.branch.manage", compact("branch"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch =Branch::find($id);
        return view("backend.pages.branch.edit", compact("branch"));
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
        $branch = Branch::find($id);
        $branch->br_name =$request->br_name;
        $branch->br_manager =$request->br_manager;
        $branch->br_phone =$request->phone;
        $branch->br_email =$request->email;
        $branch->status =$request->status;
        $branch->update();
        return redirect()->route("branchshow");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect()->route("branchshow")->with("majid","Item Deleted");
    }
}
