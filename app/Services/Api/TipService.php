<?php

namespace App\Services\Api;

use App\Exceptions\CustomException;
use App\Http\Resources\TipResource;
use App\Models\Tip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TipService
{
    /**
     * @return JsonResponse
     */
    public function viewAllTips()
    {
        $tips = Tip::all();

        return response()->json([
            'message' => 'All Tips',
            'all_tips' => TipResource::collection($tips)
        ],200);
    }

    public function getLatestTips()
    {
        $latest_tips = Tip::where('is_vip',0)
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        return response()->json([
            'message' => 'Latest Tips',
            'latest_tips' => new TipResource($latest_tips)
        ],200);
    }

    /**
     * @param $tip_id
     * @return JsonResponse
     * @throws CustomException
     */
    public function getTipById($tip_id)
    {
        $existing_tip = $this->checkIfExists($tip_id);

        return response()->json([
            'message' => 'View Tip',
            'tip' => new TipResource($existing_tip)
        ],200);
    }

    /**
     * @param $tipId
     * @return mixed
     * @throws CustomException
     */
    private function checkIfExists($tipId)
    {
        $existingTip = Tip::where('id', $tipId)->first();
        if ($existingTip == null)
            throw new CustomException("Tip with the id: $tipId does not exist",404);
        else
            return $existingTip;
    }
}
