<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
    ];
    
    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)
        ->withPivot('quantity');
    }
}
