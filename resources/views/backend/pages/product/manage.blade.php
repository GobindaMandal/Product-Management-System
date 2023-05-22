@extends('backend.mastering.master')
    @section('gobinda')  
        <div class="col-md-4">
                <span class="alert alert-success msg" style="display:none"></span>
                <input value="{{ old('name') }}" class="mt-3 form-control name" type="text" placeholder="Enter Product Name">
                <span class="text-danger error_name"></span>
    
           
                <textarea class="mt-3 form-control des" row="5" type="text" placeholder="Enter Product Description">{{ old('des') }}</textarea>
                <span class="text-danger error_des"></span>
            
           
               <select class="mt-3 form-control size">
                    <option value="">-----Select Size-----</option>
                    <option value="xl">xxl</option>
                    <option value="lg">xl</option>
                    <option value="l">l</option>
                    <option value="m">m</option>
                    <option value="sm">s</option>
                    <option value="ex">xs</option>
                </select>
                <span class="text-danger error_size"></span>
           
                <input value="{{ old('color') }}" class="mt-3 form-control color" type="color" >
                <span class="text-danger error_color"></span>
            
           
                <input value="{{ old('product_code') }}" class="mt-3 form-control product_code" type="text" placeholder="Enter Product Code">
                <span class="text-danger error_product_code"></span>
            
           
                <input value="{{ old('cost_price') }}" class="mt-3 form-control cost_price" type="number" placeholder="Enter Cost Price">
                <span class="text-danger error_cost_price"></span>
            
           
                <input value="{{ old('sale_price') }}" class="mt-3 form-control sale_price" type="number" placeholder="Enter Sale Price">
                <span class="text-danger error_sale_price"></span>
                <button class="mt-3 form-control btn-add btn btn-success">Save</button>
            </div>
            <div classs="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#sl</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Cost Price</th>
                            <th>Sale Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="data">
                    
                    </tbody>
                </table>
            </div>
<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button value="" type="button" class="delete btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <input class="mt-3 form-control" id="name" type="text" placeholder="Enter Product Name">
       
        <textarea class="mt-3 form-control" id="des" row="5" type="text" placeholder="Enter Product Description">{{ old('des') }}</textarea>
    
        <select class="mt-3 form-control" id="size">
            <option value="">-----Select Size-----</option>
            <option value="xl">xxl</option>
            <option value="lg">xl</option>
            <option value="l">l</option>
            <option value="m">m</option>
            <option value="sm">s</option>
            <option value="ex">xs</option>
        </select>
        <input class="mt-3 form-control" id="color" type="color" >
    
        <input class="mt-3 form-control" id="product_code" type="text" placeholder="Enter Product Code">
  

        <input class="mt-3 form-control" id="cost_price" type="number" placeholder="Enter Cost Price">
    
        <input class="mt-3 form-control" id="sale_price" type="number" placeholder="Enter Sale Price">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="edit btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
            
    @endsection
        
        