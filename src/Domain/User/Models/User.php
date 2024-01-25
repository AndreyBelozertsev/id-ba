<?php

namespace Domain\User\Models;

use Domain\Idea\Models\Idea;
use Support\Traits\ScopeActive;
use Laravel\Sanctum\HasApiTokens;

use Support\Traits\DateForHumman;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Domain\User\QueryBuilders\UserQueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, ScopeActive, DateForHumman;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'family',
        'patronymic',
        'phone',
        'social_link',
        'birthday',
        'email',
        'branch_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function newEloquentBuilder($query): UserQueryBuilder 
    {
         return new UserQueryBuilder($query);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }

    protected function dateFrom():string
    {
        return 'birthday';
    }
}
