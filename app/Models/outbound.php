<?php

namespace App\Models;

use App\Models\employment;
use App\Models\outbound_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class outbound extends Model
{
    use HasFactory;
    protected $fillable = ['date','total'];

    public function employment()
    {
        return $this->hasOne(employment::class);
    }
    public function outbound_detail()
    {
        return $this->hasOne(outbound_detail::class);
    }
}
