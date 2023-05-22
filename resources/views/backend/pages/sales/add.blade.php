@extends('backend.mastering.master')
    @section('gobinda')
   
    <div class="col-md-2">
            <input type="date" class="mt-3 form-control Sdate">
       </div>
       <div class="col-md-2">
            <select class=" mt-3 Sbr_id form-control">
                <option value="">-----Select Branch-----</option>
                @foreach($Branch as $Branch)
                <option value="{{ $Branch->id }}">{{ $Branch->br_name }}</option>
                @endforeach
            </select>
       </div>
       <div class="col-md-2">
            <input readonly value="202201" type="text" class=" mt-3 form-control Sinvoice" placeholder="Invoice">
       </div>
       <div class="col-md-2">
            <input readonly type="text" class=" mt-3 form-control Sastock" placeholder="A.Stock">
       </div>
       <div class="col-md-4">
            <input type="text" class=" mt-3 form-control Sproduct_id" placeholder="Enter Product ID">
       </div>
       <div class="col-md-2">
            <input type="text" class=" mt-3 form-control Squantity" placeholder="Enter Quantity">
       </div>
       <div class="col-md-2">
            <input readonly type="text" class=" mt-3 form-control Ssale_price" placeholder="Sales Price">
       </div>
       <div class="col-md-2">
            <input type="text" class=" mt-3 form-control Sdis" placeholder="Enter Discount">
       </div>
       <div class="col-md-2">
            <input readonly type="text" class=" mt-3 form-control Sdis_amount" placeholder="Enter Discount Amount">
       </div>
       <div class="col-md-2">
            <input readonly type="text" class=" mt-3 form-control Stotal_amount" placeholder="Sub Total">
       </div>
       <div class="col-md-2">
            <input readonly type="text" class=" mt-3 form-control Stotal" placeholder="Total">
       </div>
       <div class="col-md-2">
          <button class="mt-3 btn btn-info btn_saleadd form-control">Add</button>  
       </div>
       <div class="col-md-12 mt-5 pt-5">
          <table class="table">
            <tr>
                <th>Date</th>
                <th>Product Name</th>
                <th>Qnt</th>
                <th>Dis.Amount</th>
                <th>Sub Total</th>
            </tr>
            <tbody class="SalesData">
            
            </tbody>
          </table>
       </div>
       <div class="col-md-2 mt-3">
          <button class="btn-print btn btn-success form-control">Print <i class="fa fa-print"></i></button>
          </table>
       </div>
    @endsection
        