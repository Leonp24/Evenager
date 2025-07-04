<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // App\Models\Registration.php

    protected $fillable = ['event_id', 'name', 'email', 'phone'];


    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }
}
