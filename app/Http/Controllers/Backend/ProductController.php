<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    public function add(){return view("backend.pages.product.manage");}
    public function store(Request $request){
        $valid = Validator::make($request->all(),[
            'name'=>'required',
            'des'=>'required',
            'size'=>'required',
            'color'=>'required',
            'cost_price'=>'required',
            'product_code'=>'required',
            'sale_price'=>'required'
        ]);

        if($valid->fails()){
            return response()->json([
                "status"=>"faild",
                "errors"=>$valid->messages()
            ]);
        }
        else{
            $product =new Product;
            $product->name = $request->name;
            $product->des = $request->des;
            $product->size = $request->size;
            $product->color = $request->color;
            $product->cost_price = $request->cost_price;
            $product->sale_price = $request->sale_price;
            $product->product_code = $request->product_code;
            $product->save();
            return response()->json([
                "status"=>"success"
            ]);
        }
    }
    public function show(){
        $alldata=Product::all();
        return response()->json([
            'status'=>'success',
            'alldata'=>$alldata
        ]);
    }
    public function edit($id){
        $alldata=Product::find($id);
        return response()->json([
            'status'=>'success',
            "data"=>$alldata
        ]);
    }
    public function update(Request $request, $id){
        $product =Product::find($id);
        $product->name = $request->name;
        $product->des = $request->des;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->cost_price = $request->cost_price;
        $product->sale_price = $request->sale_price;
        $product->product_code = $request->product_code;
        $product->update();
        return response()->json([
            "status"=>"success"
        ]);
    }
   
    public function destroy($id){
        $alldata=Product::find($id);
        $alldata->delete();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
