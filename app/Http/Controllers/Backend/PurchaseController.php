<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;
use App\Models\Backend\Product;
use App\Models\Backend\Stock;
use App\Models\Backend\Purchase;

class PurchaseController extends Controller
{
    public function add(){
        $branch = Branch::all();
        return view("backend.pages.purchase.add", compact("branch"));
    }
    public function store(Request $request){
        
        $Purchase = new Purchase;
        $Purchase->date = $request->date;
        $Purchase->invoice = $request->invoice;
        $Purchase->br_id = $request->br_id;
        $Purchase->company_name = $request->company_name;
        $Purchase->product_id = $request->product_id;
        $Purchase->dis = $request->dis;
        $Purchase->dis_amount = $request->dis_amount;
        $Purchase->total = $request->total;
        
        $Stock = Stock::Where("br_id",$request->br_id)->Where("pr_id",$request->product_id)->get();
        if($Stock->isEmpty()){
            $Stock1 = new Stock;
            $Stock1->br_id = $request->br_id;
            $Stock1->pr_id = $request->product_id;
            $Stock1->quantity = $request->quantity;
            $Stock1->save();
        }
        else{
             foreach($Stock as $Stock){
                $Stock->quantity = $Stock->quantity + $request->quantity;
                $Stock->update();
             }
        }
        $Purchase->save();
        return response()->json([
            "status"=>"success"
        ]);
    }
    public function show(){}
    
    public function find($id){
        $product = Product::find($id);
        $stock = Stock::Where("pr_id",$id)->get();
        return response()->json([
            "product"=>$product,
            "stock"=>$stock
        ]);

    }
    public function stock(){
        $stock = Stock::all();
        return view("backend.pages.stock.productreport",compact("stock"));
    }
    public function edit($id){}
    public function update($id){}
    public function destroy($id){}
}
