<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hospital extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'address',
        // 'city',
        // 'phone',
        // 'email',
        // 'website',
        // 'description',
        // 'image',
        // 'user_id',
        // 'created_at',
        // 'updated_at',
    ];
    public function users(): HasMany{ return $this->hasMany(User::class);}

}
