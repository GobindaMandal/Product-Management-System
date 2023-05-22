@extends('backend.mastering.master')
    @section('gobinda')
       <div class="col-md-6">
            <select class="mt-3 form-control br_id">
                <option value="">-----Select Branch-----</option>
                @foreach($branch as $branch)
                <option value="{{ $branch->id }}">{{$branch->br_name}}</option>
                @endforeach
                
            </select>
            <input type="text" class="mt-3 form-control company_name" placeholder="Enter Company Name">
           
            <input type="date" class="mt-3 form-control date">
            
            <input type="text" class="mt-3 form-control invoice" placeholder="Enter Invoice Number">
            
            <input readonly type="text" class="mt-3 form-control astock" placeholder="Stock">
           
       </div>
       <div class="col-md-6">
             <input type="text" class="mt-3 form-control product_id" placeholder="Enter Product Code">
            
             <input readonly type="text" class="mt-3 form-control cost_price" placeholder="Cost Price">
            
            <input type="text" class="mt-3 form-control qnt" placeholder="Enter Quantity">
            
            <input readonly type="text" class="mt-3 form-control total" placeholder="Total">

            <input type="text" class="mt-3 form-control dis" placeholder="Enter Discount">
            
            <input readonly type="text" class="mt-3 form-control dis_amount" placeholder="Dis. Amount">
            
            
            <input readonly type="text" class="mt-3 form-control gtotal" placeholder="Grand Total">
            
            <button class="btn-puradd btn btn-success form-control mt-3">Save</button>
       </div>
    @endsection