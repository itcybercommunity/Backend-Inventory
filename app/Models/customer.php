<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\outbound;

class customer extends Model
{
    use HasFactory;
    protected $fillable =['name', 'address'];

    public function outbounds()
    {
        return $this->hasMany(outbound::class);
    }
}
