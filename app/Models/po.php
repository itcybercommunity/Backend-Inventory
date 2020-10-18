<?php

namespace App\Models;

use App\Models\inbound;
use App\Models\supplier;
use App\Models\po_detail;
use App\Models\employment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class po extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'total','id_employment', 'id_supplier', 'status'];
    protected $hidden =['created_at', 'updated_at'];
    protected $primaryKey = "faktur";

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }
    public function po_detail()
    {
        return $this->hasOne(po_detail::class);
    }
    public function employment()
    {
        return $this->belongsTo(employment::class);
    }
    public function inbounds()
    {
        return $this->hasMany(inbound::class);
    }
}

