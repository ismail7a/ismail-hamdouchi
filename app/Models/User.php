<?php

namespace App\Models;

use App\Models\Experience;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'picture',
        'about',
        'location'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    // علاقة مع المهارات
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    // علاقة مع الدراسة
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    // علاقة مع المشاريع
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // علاقة مع روابط التواصل
    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }
    // app/Models/User.php

    public function experiences()
    {
        // Bach Auth::user()->experiences() tkhdem khass had l-3alaqa
        return $this->hasMany(Experience::class);
    }
    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
 
    // app/Models/User.php

public function certificates()
{
    // العلاقة: مستخدم واحد عنده بزاف ديال الشهادات
    return $this->hasMany(Certificate::class);
}
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
