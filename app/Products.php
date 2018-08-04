<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function scopeIsForSale($query)
    {
      return $query->where('on_sale', 1);
    }
    public function scopeIsNotForSale($query)
    {
      return $query->where('on_sale', 0);
    }
}
