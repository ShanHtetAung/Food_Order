<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'status'
    ];

    /**
     * Eloquent Relationship
     *
     * @return mixed
     */
    public function user(): mixed
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
