<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'is_default',
        'notify'
    ];

    public function user() { return $this->belongsTo(User::class); }
}
