<?php

namespace App\Models;

use App\Models\po;
use App\Models\product;
use App\Models\inbound_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class po_detail extends Model
{
    use HasFactory;
    protected $fillable = ['code_faktur', 'faktur','qty', 'price'];

    public function inbound_detail()
    {
        return $this->hasOne(inbound_detail::class);
    }
    public function po()
    {
        return $this->belongsTo(po::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
