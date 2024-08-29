<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Period extends Model
{
    use HasFactory;
    protected $fillable=[
        'patient_id',
        'user_id',
        'name_disease',
        'description',
        'date_start',
        'date_end',
    ];
    public function patient(): BelongsTo{ return $this->belongsTo(Patient::class);}
    public function drugs(): BelongsToMany { return $this->belongsToMany(Drug::class)->withPivot('message', 'created_at','id')->withTimestamps()->orderBy('pivot_created_at', 'asc');}
    public function user(): BelongsTo{ return $this->belongsTo(User::class);}
    public function diagnoses(): HasMany {return $this->hasMany(diagnosis::class);}
    
}
