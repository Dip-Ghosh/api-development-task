<?php

// /////////////////////////////////////////////////////////////////////////////
// PLEASE DO NOT RENAME OR REMOVE ANY OF THE CODE BELOW.
// YOU CAN ADD YOUR CODE TO THIS FILE TO EXTEND THE FEATURES TO USE THEM IN YOUR WORK.
// /////////////////////////////////////////////////////////////////////////////

namespace App\Http\Controllers;

use App\Http\Requests\MultipleFormRequestValidation;
use App\Http\Resources\PlayerResource;
use App\Service\PlayerService;
use App\Service\PlayerSkillService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    protected PlayerService $playerService;
    protected PlayerSkillService $playerSkillService;

    public function __construct(PlayerService $playerService, PlayerSkillService $playerSkillService)
    {
        $this->playerService      = $playerService;
        $this->playerSkillService = $playerSkillService;
    }

    public function index(): JsonResponse
    {
        try {
            $players = $this->playerService->getPlayers();

            return $this->ResponseSuccess(PlayerResource::collection($players), "Player list", 200);
        } catch (Exception $e) {
            return $this->ResponseError($e->getMessage(), 404);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $player = $this->playerService->findPlayer($id);

            return $this->ResponseSuccess(new PlayerResource($player), "Single Player", 200);
        } catch (Exception $e) {
            return $this->ResponseError($e->getMessage(), 404);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $this->playerService->deletePlayer($id);

            return $this->ResponseSuccess(null, "Player deleted successfully.", 204);
        } catch (Exception $e) {
            return $this->ResponseError( $e->getMessage(), 404 );
        }
    }

    public function store(MultipleFormRequestValidation $request): JsonResponse
    {
        try {
            $player = $this->playerService->savePlayer($request->only('name', 'position'));
            $this->playerSkillService->savePlayerSkill($player->id, $request->only('playerSkills'));

            return $this->ResponseSuccess(new PlayerResource($player), "Player and associative skills for player has been saved successfully.", 201);
        } catch (Exception $e) {
            return $this->ResponseError( $e->getMessage(), 404);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $this->playerSkillService->updatePlayerSkill($id, $request->only('playerSkills'));
            $player = $this->playerService->updatePlayer($id, $request->only('name', 'position'));

            return $this->ResponseSuccess(new PlayerResource($player), "Player and associative skills for player has been updated successfully.", 200);
        } catch (Exception $e) {
            return $this->ResponseError($e->getMessage(), 404);
        }
    }


}
