<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    protected $fillable = [
        'product_id', 'action', 'changed_by', 'changes'
    ];

    protected $casts = [
        'changes' => 'array',
    ];
}