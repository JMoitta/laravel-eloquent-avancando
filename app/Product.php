<?php

namespace App;

use App\Scopes\ActivatedScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'resume_title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'title'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActivatedScope());
    }

    public function getResumeTitleAttribute()
    {
        if(isset($this->attributes['title'][3])) {
            return mb_substr($this->attributes['title'], 0, 3) . '...';
        }

        return $this->attributes['title'];
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = \strtoupper($value);
    }
}
