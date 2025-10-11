<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use Hasfactory;

    protected $fillable = [
        'username',
        'email_target',
        'email_nick',
        'email_full',
        'libera_nick',
        'libera_cloak',
        'libera_cloak_applied',
        'status',
    ];
}
