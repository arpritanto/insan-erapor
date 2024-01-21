<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenSbdp extends Model
{
    use HasFactory;
    protected $primaryKey = 'NISN';
    public $timestamps = false;
    protected $table = 'p_sbdp';
    protected $guarded = [];
}
