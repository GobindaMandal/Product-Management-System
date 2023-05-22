@extends('backend.mastering.master')
    @section('gobinda')
       <div class="12">
            <table class="table" border="1">
                <tr>
                    <th>Branch Name</th>
                    <th>Branch Manager Name</th>
                    <th>Product Name</th>
                    <th>Cost Price</th>
                    <th>Sales Price</th>
                    <th>Quantity</th>
                </tr>
                <?php $count=0; ?>
                @foreach($stock as $stock)
                <tr>
                    <td>{{ $stock->br->br_name }}</td>
                    <td>{{ $stock->br->br_manager }}</td>
                    <td>{{ $stock->pr->name }}</td>
                    <td>{{ $stock->pr->cost_price }}</td>
                    <td>{{ $stock->pr->sale_price }}</td>
                    <td>{{ $stock->quantity }}</td>
                </tr>
                <?php $count += $stock->quantity; ?>
                @endforeach 
                <tr>
                    <td colspan="6" class="text-right">{{ $count }}</td>
                </tr>
                <tr>
                    <td  colspan="6" class="text-right">
                    <button class="btn btn-info" onclick="window.print()"><i class="fa fa-print"></i></button>
                    </td>
                </tr>
            </table>
       </div>
    @endsection