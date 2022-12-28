<?php

namespace App\Models;

use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{   use Notifiable;
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;
    use SoftDeletes;

    protected $table = 'users';
    protected $fillable = [
        'image',
        'name',
        'phone',
        'position',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }
}