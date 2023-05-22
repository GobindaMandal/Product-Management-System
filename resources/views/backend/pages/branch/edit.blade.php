@extends('backend.mastering.master')
    @section('gobinda')
        <form action="{{ Route('branchupdate',$branch->id) }}" method="POST">
        @csrf    
        <div class="form-group">
                <input value="{{ $branch->br_name }}" class="form-control" type="text" name="br_name" placeholder="Enter Branch Name">
            </div>
            <div class="form-group">
                <input value="{{ $branch->br_manager }}" class="form-control" type="text" name="br_manager" placeholder="Enter Branch Manager Name">
            </div>
            
            <div class="form-group">
                <input value="{{ $branch->br_phone }}" class="form-control" type="text" name="phone" placeholder="Enter Phone">
            </div>
            <div class="form-group">
                <input value="{{ $branch->br_email }}" class="form-control" type="text" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <select name="status" class="form-control">
                    <option value="">-----Select Status-----</option>
                    <option value="1" @if ($branch->status== 1) selected @endif>Active</option>
                    <option value="2" @if ($branch->status== 2) selected @endif>Inavctive</option>
                </select>
            </div>
            <button class="form-control btn btn-success">Save</button>
        </form> 
    @endsection
        
        