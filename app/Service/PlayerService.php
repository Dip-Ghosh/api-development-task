<?php

namespace App\Service;

use App\Repository\PlayerInterface;

class PlayerService
{
    protected $player;

    public function __construct(PlayerInterface $player)
    {
        $this->player = $player;
    }

    public function getPlayers()
    {
        return $this->player->fetchAll();
    }

    public function findPlayer($id)
    {
        return $this->player->search($id);
    }

    public function deletePlayer($id)
    {
       return $this->player->remove($id);
    }

    public function savePlayer($params)
    {
        $this->player->save($params);
        return $this->getLastInsertId();
    }

    private function getLastInsertId()
    {
        return $this->player->getInsertedPlayerId();
    }

    public function updatePlayer($id, $params)
    {
       return $this->player->update($params,$id);
    }

}