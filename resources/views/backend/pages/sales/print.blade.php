<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sales Print Page</title>
</head>
<body>
    
   <div class="row" style="padding:15px;text-align:center; width:60%; margin:auto;border:1px solid black">
      <h2>Merchant Shopping Center</h2>
      <h4>Thana Road, Joypuhat Sadar-5900</h4>
      <p>Reg: 20012012</p>
      <img src="{{asset('backend/img/fav.png')}}" alt="">
      <div style="overflow:hidden">
        <div class="left" style="float:left;">Print Date: 24/09/2022</div>
        <div class="right" style="float:right;">Time: 12:30:25 AM</div>
      </div>
      <hr>

      <table align="center" border="1">
         <tr>
            <th>#sl</th>
            <th>Product Name</th>
            <th>Qnt</th>
            <th>Price</th>
            <th>Dis. Amount</th>
            <th>Sub Total</th>
         </tr>
         <?php $sl=1 ?>
            @foreach($sales as $sale)
            <th>{{$sl}}</th>
            <th>{{$sale->product_id}}</th>
            <th>{{$sale->quantity}}</th>
            <th>1500</th>
            <th>{{$sale->dis_amount}}</th>
            <th>{{$sale->total_amount}}</th>
            <?php $sl++; ?>
</tr>
            @endforeach
         <tr>
            <th colspan="5">Grand Total</th>
            <th colspan="1">3000/-</th>
         </tr>
         <tr>
            <button onclick="window.print()">Print</button>
         </tr>
      </table>

      <h3>Thank you for purchase</h3>
   </div>
   <style>
    .row{
        
    }
    img{
        position: absolute;
        right:45%;
        top:20%;
        transparent:translate(-20%,20%);
        width:200px;
        border-radius:50%;
        opacity:.2;
        z-index: -1;
    }
        @media print{
            button{
                display:none;
            }
        }
   </style>
</body>
</html>