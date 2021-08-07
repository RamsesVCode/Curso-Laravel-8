<?php

namespace App\Models;

use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Order;
use App\Models\Cart;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new AvailableScope);
    }


    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status'
    ];

    protected $with = [
        'images',
    ];

    public function orders(){
        return $this->morphedByMany(Order::class,'productable')
        ->withPivot('quantity');
    }
    public function carts(){
        return $this->morphedByMany(Cart::class,'productable')
        ->withPivot('quantity');
    }

    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

    public function scopeAvailable($query){
        $query->where('status','available');
    }
    
    public function getTotalAttribute(){
        return $this->pivot->quantity * $this->price;
    }
}
