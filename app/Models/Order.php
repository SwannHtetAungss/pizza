<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
