<?php

namespace App\Http\Api\Modules\Company\Models;

use App\Http\Api\Modules\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'URL',
        'logo'
    ];
    protected $casts = [
    ];
    protected $hidden = [
        'id'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
