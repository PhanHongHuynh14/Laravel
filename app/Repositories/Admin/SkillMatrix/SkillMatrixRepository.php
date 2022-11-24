<?php

namespace App\Repositories\Admin\SkillMatrix;

use App\Models\SkillMatrix;
use App\Repositories\BaseRepository;

class SkillMatrixRepository extends BaseRepository implements SkillMatrixRepositoryInterface
{
    public function __construct(SkillMatrix $model)
    {
        $this->model = $model;
    }
}
