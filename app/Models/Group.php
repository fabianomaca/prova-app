<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Group extends Authenticatable
{
    use HasFactory;

    // Defina os atributos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'description',
    ];

    // Se você tiver um relacionamento com usuários, adicione isso também
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}