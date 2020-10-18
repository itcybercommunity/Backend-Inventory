<?php

namespace App\Models;

use App\Models\type;
use App\Models\po_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_type'];
    protected $primaryKey = "code";

    public function type()
    {
        return $this->belongsTo(type::class);
    }

    public function po_details()
    {
        return $this->hasMany(po_detail::class);
    }
}
