<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function applicationTypes():BelongsTo
    {
        return $this->belongsTo(Application_type::class, 'application_type_id');
    }
}
