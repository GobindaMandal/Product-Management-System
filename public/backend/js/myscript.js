jQuery(document).ready(function(){
    show();
    jQuery(document).on("click", ".btn-edit", function(){
        var id=jQuery(this).val();
        $.ajax({
            url:"/product/edit/"+id,
            type:"get",
            dataType:"json",
            success:function(response){
                jQuery("#name").val(response.data.name);
                jQuery("#des").val(response.data.des);
                jQuery("#color").val(response.data.color);
                jQuery("#size").val(response.data.size);
                jQuery("#product_code").val(response.data.product_code);
                jQuery("#cost_price").val(response.data.cost_price);
                jQuery("#sale_price").val(response.data.sale_price);
                jQuery(".edit").val(response.data.id);
            }
        })
    })
    jQuery(document).on("click",".edit",function(){
        var id=jQuery(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var name        =jQuery("#name").val();
        var des         =jQuery("#des").val();
        var size        =jQuery("#size").val();
        var color       =jQuery("#color").val();
        var product_code=jQuery("#product_code").val();
        var cost_price  =jQuery("#cost_price").val();
        var sale_price  =jQuery("#sale_price").val();
        $.ajax({
            url:"/product/update/"+id,
            type:"POST",
            dataType:"JSON",
            data:{
                name:name,
                des:des,
                size:size,
                color:color,
                product_code:product_code,
                cost_price:cost_price,
                sale_price:sale_price
            },
            success:function(response){
                if(response.status=="success"){
                    show();
                    jQuery(".msg").show().text("Product Updated");
                    jQuery("#edit").modal("hide");
                    jQuery("#name").val("");
                    jQuery("#des").val("");
                    jQuery("#size").val("");
                    jQuery("#color").val("");
                    jQuery("#product_code").val("");
                    jQuery("#cost_price").val("");
                    jQuery("#sale_price").val("");
                    jQuery(".msg").fadeOut(1000);
                   }
            }

        })
    })
    jQuery(document).on("click", ".btn-delete", function(e){
        var id=jQuery(this).val();
        jQuery(".delete").val(id);
    });
    jQuery(document).on("click",".delete",function(){
        var id=jQuery(this).val();
        $.ajax({
            url:"/product/destroy/"+id,
            type:"get",
            dataType:"json",
            success:function(response){
                if(response.status !="success"){
                    show();
                    jQuery(".msg").show().text("Product Not Deleted");
                    jQuery(".msg").fadeOut(1000);
                    jQuery("#delete").modal("hide");
                }
                else{
                    show();
                    jQuery(".msg").show().text("Product Deleted");
                    jQuery(".msg").fadeOut(1000);
                    jQuery("#delete").modal("hide");
                }
            }
        })
    })
    function show(){
        $.ajax({
            url:"/product/show",
            type:"GET",
            dataType:"JSON",
            success:function(response){
                var data="";
                var sl=1;
                if(response.status=="success"){
                    $.each(response.alldata, function(key,item){
                        data +='<tr>\
                        <td>'+sl+'</td>\
                        <td>'+item.name+'</td>\
                        <td>'+item.product_code+'</td>\
                        <td>'+item.cost_price+'</td>\
                        <td>'+item.sale_price+'</td>\
                        <td>\
                            <button data-toggle="modal" data-target="#edit" value="'+item.id+'" class="btn-edit btn btn-info btn-sm"><i class="fa fa-edit"></i></button>\
                            <button data-toggle="modal" data-target="#delete" value="'+item.id+'" class="btn-delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>\
                        </td>\
                    </tr>';
                        sl++;
                    });
                    jQuery(".data").html(data);
                }
                else{

                }
            }
        })
    }    

    jQuery(".btn-add").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var name        =jQuery(".name").val();
        var des         =jQuery(".des").val();
        var size        =jQuery(".size").val();
        var color       =jQuery(".color").val();
        var product_code=jQuery(".product_code").val();
        var cost_price  =jQuery(".cost_price").val();
        var sale_price  =jQuery(".sale_price").val();
        $.ajax({
            url:"/product/store",
            type:"POST",
            dataType:"JSON",
            data:{
                name:name,
                des:des,
                size:size,
                color:color,
                product_code:product_code,
                cost_price:cost_price,
                sale_price:sale_price
            },
            success:function(response){
                if(response.status=="faild"){
                    jQuery(".error_name").text(response.errors.name);
                    jQuery(".error_des").text(response.errors.des);
                    jQuery(".error_size").text(response.errors.size);
                    jQuery(".error_color").text(response.errors.color);
                    jQuery(".error_product_code").text(response.errors.product_code);
                    jQuery(".error_cost_price").text(response.errors.cost_price);
                    jQuery(".error_sale_price").text(response.errors.sale_price);
                }
                else{
                    show();
                    jQuery(".msg").show().text("Product Added");
                    jQuery(".error_name").text("");
                    jQuery(".error_des").text("");
                    jQuery(".error_size").text("");
                    jQuery(".error_color").text("");
                    jQuery(".error_product_code").text("");
                    jQuery(".error_cost_price").text("");
                    jQuery(".error_sale_price").text("");
                    jQuery(".name").val("");
                    jQuery(".des").val("");
                    jQuery(".size").val("");
                    jQuery(".color").val("");
                    jQuery(".product_code").val("");
                    jQuery(".cost_price").val("");
                    jQuery(".sale_price").val("");
                    jQuery(".msg").fadeOut(1000);
                }
            }

        })
    })
    jQuery(document).on("keyup",".qnt",function(){
        var _qnt = jQuery(this).val();
        var _price = jQuery(".cost_price").val();
        var _total = _qnt * _price;
        jQuery(".total").val(_total);
    });
    
    jQuery(document).on("keyup",".dis",function(){
        var _dis = jQuery(this).val();
        var _total = jQuery(".total").val();
        var _totalAmount = ((_total*_dis)/100);
        jQuery(".dis_amount").val(_totalAmount);
        var _gtotal = _total - _totalAmount;
        jQuery(".gtotal").val(_gtotal);
    });

    jQuery(".btn-puradd").click(function(){

        var date = jQuery(".date").val();
        var invoice = jQuery(".invoice").val();
        var br_id = jQuery(".br_id").val();     
        var company_name = jQuery(".company_name").val();     
        var product_id = jQuery(".product_id").val();     
        var dis = jQuery(".dis").val();     
        var dis_amount = jQuery(".dis_amount").val();     
        var total = jQuery(".gtotal").val();   
        var quantity = jQuery(".qnt").val();   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"/purchse/store",
            type:"POST",
            dataType:"JSON",
            data:{
                date         :date,
                invoice      :invoice,
                br_id        :br_id,     
                company_name :company_name,     
                product_id   :product_id,     
                dis          :dis,     
                dis_amount   :dis_amount,     
                total        :total,
                quantity     :quantity
            },
            success:function(response){
                console.log(response.stock);
            }
        })
    });

    jQuery(document).on("keyup",".product_id",function(){
        var product_id=jQuery(this).val();
        $.ajax({
            url:"/purchse/find/"+product_id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                jQuery(".cost_price").val(response.product.cost_price);
                if(response.stock.length==0){
                    jQuery(".astock").val("0");
                } 
                else{
                    $.each(response.stock, function(key, item){   
                    jQuery(".astock").val(item.quantity);
                        });
                    }
            }
        })
    });

    jQuery(document).on("keyup",".Sproduct_id", function(){
        var _product_id = jQuery(this).val();
        $.ajax({
            url:"/sale/find/"+_product_id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                jQuery(".Ssale_price").val(response.data.sale_price);
            }
        })
    })
    jQuery(document).on("keyup",".Squantity", function(){
        var _qnt = jQuery(this).val();
        var _salePrice = jQuery(".Ssale_price").val();
        var _total=_qnt * _salePrice;
        jQuery(".Stotal_amount").val(_total);
        
    })
    jQuery(document).on("keyup",".Sdis", function(){
        var _dis = jQuery(this).val();
        var _total = jQuery(".Stotal_amount").val();
        var _dis_amount=((_total*_dis)/100);
        jQuery(".Sdis_amount").val(_dis_amount);
        var gtotal=(_total - _dis_amount);
        jQuery(".Stotal").val(gtotal);
    })
    jQuery(document).on("click",".btn_saleadd", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
       var date=jQuery(".Sdate").val();
       var br_id=jQuery(".Sbr_id").val();
       var invoice=jQuery(".Sinvoice").val();
       var product_id=jQuery(".Sproduct_id").val();
       var quantity=jQuery(".Squantity").val();
       var dis=jQuery(".Sdis").val();
       var dis_amount=jQuery(".Sdis_amount").val();
       var total_amount=jQuery(".Stotal").val();

       $.ajax({
        url:"/sale/store",
        type:"POST",
        dataType:"JSON",
        data:{
            date         :date,
            br_id        :br_id,
            invoice      :invoice,
            product_id   :product_id,
            quantity     :quantity,
            dis          :dis,
            dis_amount   :dis_amount,
            total_amount :total_amount
        },
        success:function(response){
            if(response.status=="success"){
                salesShow(invoice);
            }
        }
       })
    });

    function salesShow(invoice){
        $.ajax({
            url:"/sale/salesShow/"+invoice,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                var SalesData='';
                $.each(response.data, function(key, item){
                    SalesData += '<tr>\
                    <td>'+item.date+'</td>\
                    <td>'+item.product_id+'</td>\
                    <td>'+item.quantity+'</td>\
                    <td>'+item.dis_amount+'</td>\
                    <td>'+item.total_amount+'</td>\
                    <td><button value="'+item.id+'" class="salesDelete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>\
                </tr>'
                });
                jQuery(".SalesData").html(SalesData);
            }
        })
    } 

    jQuery(document).on("click",".salesDelete", function(){
        var id = jQuery(this).val();
        var invoice=jQuery(".Sinvoice").val();
        $.ajax({
            url:"/sale/destroy/"+id,
            type:"GET",
            dataType:"JSON",
            success:function(response){
                if(response.status=="success"){
                    salesShow(invoice);
                }
            }
        })
    })
    jQuery(document).on("click",".btn-print", function(){
        
        var invoice=jQuery(".Sinvoice").val();
        window.location.replace("http://127.0.0.1:8000/sale/print/"+invoice+"");
    })

});