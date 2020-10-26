<?php

namespace App\Models;

use App\Models\retur;
use App\Models\customer;
use App\Models\roadblock;
use App\Models\employment;
use App\Models\outbound_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class outbound extends Model
{
    use HasFactory;
    protected $fillable=['id_customer', 'id_employment','date', 'total'];

    public function employment()
    {
        return $this->belongsTo(employment::class);
    }
    public function roadblock()
    {
        return $this->hasOne(roadblock::class);
    }
    public function cutomers()
    {
        return $this->belongsTo(customer::class);
    }
    public function outbound_detail()
    {
        return $this->hasOne(outbound_detail::class);
    }
    public function retur()
    {
        return $this->hasOne(retur::class);
    }
}
