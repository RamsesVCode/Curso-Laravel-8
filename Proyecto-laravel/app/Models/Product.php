<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Image;
use App\Scopes\AvailableScope;

class Product extends Model
{
    protected $table = 'products';
    protected $with = [
        'images',
    ];
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new AvailableScope);
    }

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];

    public function carts(){
        return $this->morphedByMany(Cart::class,'productable')->withPivot('quantity');
    }
    public function orders(){
        return $this->morphedByMany(Order::class,'productable')->withPivot('quantity');
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
