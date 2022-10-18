<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_staff',
        'date',
        'time_start',
        'time_end',
        'note',
        'overtime',
    ];

    public function staff() {
        $this->belongsTo(Staff::class, 'id_staff');
    }
}
