<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenPjok extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'p_pjok';
    protected $guarded = [];
}
