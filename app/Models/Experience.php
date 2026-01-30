<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{// app/Models/Experience.php

protected $fillable = [
    'user_id', // Had l-ster darouri bach tkhdem Auth::user()->experiences()->create()
    'name',
    'company',
    'start_date',
    'end_date',
    'description',
];
}
