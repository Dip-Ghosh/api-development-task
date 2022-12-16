<?php

namespace App\Service;

use App\Repository\PlayerSkillInterface;

class PlayerSkillService
{
    protected $playerSkill;

    public function __construct(PlayerSkillInterface $playerSkill)
    {
        $this->playerSkill = $playerSkill;
    }

    public function savePlayerSkill($playerId, $playerSkillParams)
    {
        foreach ($playerSkillParams as $skillParams) {
            foreach($skillParams as $skill) {
                $data = [
                    'skill'     => $skill['skill'],
                    'value'     => $skill['value'] ?? null,
                    'player_id' => $playerId,
                ];

                $this->playerSkill->save($data);
            }
        }
    }

    public function updatePlayerSkill($playerId, $playerSkillParams)
    {
        $data = [];
        foreach ($playerSkillParams as $skillParams) {
            foreach($skillParams as $skill) {
                $data[] = [
                    'skill'     => $skill['skill'],
                    'value'     => $skill['value'] ?? null,
                    'player_id' => $playerId
                ];
            }
        }
       return $this->playerSkill->updateSkill($playerId,$data);
    }
}