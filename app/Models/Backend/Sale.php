<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        "date",
        "br_id",
        "invoice",
        "product_id",
        "quantity",
        "dis",
        "dis_amount",
        "total_amount"
    ];
}
