<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Admin\ManageTipService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ManageTipController extends Controller
{

    private $_tipService;

    public function __construct(ManageTipService $tipService)
    {
        $this->middleware('auth:admin');
        $this->_tipService = $tipService;
    }

    /**
     * Get all tips from storage
     */
    public function getAllTips()
    {
        return $this->_tipService->viewAllTips();
    }

    /**
     * Create tip form
     *
     * @return Application|Factory|View
     */
    public function showTipCreationForm()
    {
        return view('tips.create');
    }

    /**
     * Add a new tip to storage
     *
     * @param Request $request
     */
    public function createTip(Request $request)
    {
        return $this->_tipService->createNewTip($request);
    }

    /**
     * Edit tip form
     *
     * @return Application|Factory|View
     */
    public function showTipEditForm($tip_id)
    {
        return $this->_tipService->showEditForm($tip_id);
    }

    /**
     * Edit an existing tip to storage
     *
     * @param Request $request
     */
    public function editTip(Request $request)
    {
        return $this->_tipService->updateExistingTip($request);
    }

    /**
     * Remove an existing tip from storage
     *
     * @param Request $request
     */
    public function deleteTip(Request $request, $tip_id)
    {
        return $this->_tipService->deleteTip($tip_id);
    }
}
