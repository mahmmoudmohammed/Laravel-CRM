<?php

namespace App\Http\Api\Modules\Employee\Models;

use App\Http\Api\Modules\Company\Models\Company;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'is_intern',
        'started_at',
        'company_id',
    ];
    const INTERN_PERIOD = 5;
    protected $casts = [
        'is_intern'  => 'boolean',
        'started_at' => 'datetime',
    ];

    protected $hidden = [
        'id', 'password'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    protected static function newFactory()
    {
        return EmployeeFactory::new();
    }
}
