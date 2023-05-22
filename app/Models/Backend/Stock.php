<?php

namespace App\Models\Backend;
use App\Models\Backend\Branch;
use App\Models\Backend\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    
    public function br(){
        return $this->belongsTo(Branch::class, 'br_id');
    }
    public function pr(){
        return $this->belongsTo(Product::class, 'pr_id');
    }
}
