<?php

namespace App\Repository;

use App\Models\Player;
use App\Repository\Base\BaseRepository;

class PlayerRepository extends BaseRepository implements PlayerInterface
{
    protected $model;

    public function __construct(Player $model)
    {
        parent::__construct($model);
    }

    public function getInsertedPlayerId()
    {
        return $this->model->latest()->first();
    }

}
