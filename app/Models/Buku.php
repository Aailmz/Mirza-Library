<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Buku extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'bukus';

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
}
