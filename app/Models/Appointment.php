<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['pat_id', 'serv_id', 'date', 'time','status'];

    public function patient(){
        return $this->belongsTo(Patient::class,'pat_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'serv_id');
    }
}

