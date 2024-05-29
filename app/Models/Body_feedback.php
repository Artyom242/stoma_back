<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Body_feedback extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function getServicesComment():BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'comments', 'body_feedback_id', 'service_id');
    }
}
