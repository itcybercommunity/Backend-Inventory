<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class type extends Model
{
    use HasFactory;
    protected $fillable=['type'];

    public function product()     
    {
        return $this->hasOne(product::class);
    }
}
