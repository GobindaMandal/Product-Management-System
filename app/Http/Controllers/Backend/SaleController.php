<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;
use App\Models\Backend\Product;
use App\Models\Backend\Sale;

class SaleController extends Controller
{
    public function add(){
        $Branch = Branch::all();
        return view("backend.pages.sales.add", compact("Branch"));
    }
    public function find($id){
        $product = Product::find($id);

        return response()->json([
            'data'=>$product
        ]);
    }
    public function store(Request $rqst){
        $sale = New Sale;
        $sale->date         = $rqst->date;
        $sale->br_id        = $rqst->br_id;
        $sale->invoice      = $rqst->invoice;
        $sale->product_id   = $rqst->product_id;
        $sale->quantity     = $rqst->quantity;
        $sale->dis          = $rqst->dis;
        $sale->dis_amount   = $rqst->dis_amount;
        $sale->total_amount = $rqst->total_amount;

        $sale->save();
        return response()->json([
            'status'=>"success"
        ]);
    }
    public function salesShow($invoice){
        $sales = Sale::Where("invoice", $invoice)->get();
        return response()->json([
            "data"=>$sales
        ]);
    }
    public function destroy($id){
        $sales = Sale::find($id);
        $sales->delete();
        return response()->json([
            "status"=>"success"
        ]);
    }
    public function print($id){
        $sales = Sale::Where("invoice",$id)->get();
        return view("backend.pages.sales.print", compact("sales"));
    }
    public function update(){}
    
}
