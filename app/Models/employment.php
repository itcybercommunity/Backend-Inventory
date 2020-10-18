<?php

namespace App\Models;

use App\Models\po;
use App\Models\outbound;
use App\Models\department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'gender','email', 'password', 'phone', 'address', 'id_department'];
    protected $primaryKey = "nip";

    public function department()
    {
        return $this->belongsTo(department::class, "id_department", "id");
    }

    public function outbounds()
    {
        return $this->hasMany(outbound::class);
    }
    public function pos()
    {
        return $this->hasMany(po::class);
    }
}
