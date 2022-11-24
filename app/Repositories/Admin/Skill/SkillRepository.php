<?php

namespace App\Repositories\Admin\Skill;

use App\Models\Skill;
use App\Repositories\BaseRepository;

class SkillRepository extends BaseRepository implements SkillRepositoryInterface
{
    public function __construct(Skill $model)
    {
        $this->model = $model;
    }
}
