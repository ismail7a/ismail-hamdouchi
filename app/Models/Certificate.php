<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
 // app/Models/Certificate.php

protected $fillable = [
    'user_id',
    'title',
    'description',
    'image',
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
