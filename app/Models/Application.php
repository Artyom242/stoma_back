<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Application extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function applicationTypes():BelongsTo
    {
        return $this->belongsTo(Application_type::class, 'application_type_id');
    }

    public function applicationTimes(): HasMany
    {
        return $this->hasMany(Application_time::class, 'application_id');
    }
}
