<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['user_id', 'name', 'slug', 'description', 'project_link'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // هادي هي المهمة: مشروع عندو بزاف ديال التصاور
    public function images() {
        return $this->hasMany(ProjectImage::class);
    }
}
