<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\TipResource;
use App\Services\Api\TipService;
use Illuminate\Http\JsonResponse;

class TipController extends Controller
{
    /**
     * @var TipService
     */
    private $_tipService;

    public function __construct(TipService $tipService)
    {
        $this->middleware('web');
        $this->_tipService = $tipService;
    }

    /**
     * View all tips
     *
     * This endpoint lets you get all the tips from the storage
     * @return JsonResponse
     */
    public function viewAllTips()
    {
        return $this->_tipService->viewAllTips();
    }

    /**
     * Latest tips
     *
     * This endpoint lets you get latest tips from the storage
     * @return JsonResponse
     */
    public function getLatestTips()
    {
        return $this->_tipService->getLatestTips();
    }

    /**
     * View a tip
     *
     * This endpoint lets you get a single tip using its id
     * Throws an error if the tip is not found in storage
     * @param $tip_id
     * @return JsonResponse
     * @throws CustomException
     */
    public function viewTip($tip_id)
    {
        return $this->_tipService->getTipById($tip_id);
    }
}
