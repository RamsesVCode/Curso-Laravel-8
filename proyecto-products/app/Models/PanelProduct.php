<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;

class PanelProduct extends Product
{
    use HasFactory;
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        // 
    }
    public function getMorphClass(){
        $parent = get_parent_class($this);
        return (new $parent)->getMorphClass();
    }
}

