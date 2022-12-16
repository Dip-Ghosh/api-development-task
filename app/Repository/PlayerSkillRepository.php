<?php

namespace App\Repository;

use App\Models\PlayerSkill;
use App\Repository\Base\BaseRepository;

class PlayerSkillRepository extends BaseRepository implements PlayerSkillInterface
{
    protected $model;

    public function __construct(PlayerSkill $model)
    {
        parent::__construct($model);
    }

    public function updateSkill($id, $skills)
    {
        $this->model->where('player_id',$id)->delete();
        foreach ($skills as $skill)
        {
          return  $this->model->create($skill);
        }
    }

}
