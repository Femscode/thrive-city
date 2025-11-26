<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_request_id',
        'product_id',
        'product_name',
        'product_type',
        'size',
        'color',
        'placements',
        'design_file',
        'price',
        'qty',
    ];

    protected $casts = [
        'placements' => 'array',
        'price' => 'decimal:2',
    ];

    public function order()
    {
        return $this->belongsTo(OrderRequest::class, 'order_request_id');
    }
}