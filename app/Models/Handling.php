<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Handling extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_wo',
        'customer_id',
        'type_id',
        'thickness',
        'weight',
        'outer_diameter',
        'inner_diameter',
        'lenght',
        'qty',
        'pcs',
        'category',
        'process_type',
        'type_1',
        'type_2',
        'image',
        'status',
    ];

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function type_materials(): BelongsTo
    {
        return $this->belongsTo(TypeMaterial::class, 'type_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function schedule_viist(): HasMany
    {
        return $this->hasMany(ScheduleVisit::class);
    }

}
