<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drug extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'category_id',
        // 'price',
        // 'quantity',
        // 'image',
        // 'hospital_id',
        // 'user_id',
        // 'drug_id',
    ];
    public function periods(): BelongsToMany { return $this->belongsToMany(Period::class,'drug_period')->withTimestamps()->withPivot('message', 'created_at','id');}
    public function category():BelongsTo{ return $this->belongsTo(Category::class);}


}
