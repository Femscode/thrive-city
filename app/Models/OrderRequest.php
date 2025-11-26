<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_type',
        'tshirt_type',
        'size',
        'color',
        'placements',
        'design_file',
        'customer_name',
        'customer_email',
        'customer_phone',
        'special_instructions',
        'status',
        'customer_address',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'placements' => 'array',
    ];

    /**
     * Get the placement options as a formatted string.
     *
     * @return string
     */
    public function getPlacementsStringAttribute()
    {
        return implode(', ', $this->placements ?? []);
    }

    /**
     * Relationship: an order has many items
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_request_id');
    }
}
