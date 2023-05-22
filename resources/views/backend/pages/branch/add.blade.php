@extends('backend.mastering.master')
    @section('gobinda')
        <form action="{{ Route('branchstore') }}" method="POST">
        @csrf    
        <div class="form-group">
                <input value="{{ old('br_name') }}" class="form-control" type="text" name="br_name" placeholder="Enter Branch Name">
                <span class="text-danger">
                    @error('br_name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <input value="{{ old('br_manager') }}" class="form-control" type="text" name="br_manager" placeholder="Enter Branch Manager Name">
                <span class="text-danger">
                    @error('br_manager')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            
            <div class="form-group">
                <input value="{{ old('phone') }}" class="form-control" type="text" name="phone" placeholder="Enter Phone">
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <input value="{{ old('email') }}" class="form-control" type="text" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <select name="status" class="form-control">
                    <option value="">-----Select Status-----</option>
                    <option value="1" @if (old('status')== 1) selected @endif>Active</option>
                    <option value="2" @if (old('status')== 2) selected @endif>Inavctive</option>
                </select>
            </div>
            <button class="form-control btn btn-success">Save</button>
        </form> 
    @endsection
        
        