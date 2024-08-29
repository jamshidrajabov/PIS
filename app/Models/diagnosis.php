<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class diagnosis extends Model
{
    protected $fillable=[
    'period_id',
    'description'    
    ];
    public function period(): BelongsTo{ return $this->belongsTo(Period::class);}
    use HasFactory;
}
