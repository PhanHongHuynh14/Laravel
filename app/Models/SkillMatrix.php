<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillMatrix extends Model
{
    use HasFactory;
    protected $table = "skillmatrixs";
    protected $fillable = [
        'id',
        'skill_id',
        'level_id',
        'user_id'
    ];
    public function skills()
    {
        return $this->belongsTo(Skill::class);
    }
    public function levels()
    {
        return $this->belongsTo(Level::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
