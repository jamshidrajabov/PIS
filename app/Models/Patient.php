<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        
        
        'first_name',
        'last_name',
        'passport',
        'birth',
        'phone',
        'address',
        'gender',
        'blood_type',
        'height',
        'weight',
    ];

    
    public function periods(): HasMany {return $this->hasMany(Period::class);}

}
