<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];
    public function skillmatrixs()
    {
        return $this->hasMany(SkillMatrix::class);
    }
}
