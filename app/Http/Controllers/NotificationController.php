<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * @var NotificationService
     */
    private $_notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->_notificationService = $notificationService;
    }

    /**
     * Get all notifications from storage
     * They belong to either member or admin
     *
     * @return Application|Factory|View
     */
    public function getNotifications()
    {
        return $this->_notificationService->retrieveNotifications();
    }

    /**
     * Delete a single notification
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteNotification(Request $request)
    {
        return $this->_notificationService->removeNotification($request);
    }

    /**
     * Delete a single notification
     *
     * @return JsonResponse
     */
    public function deleteAllNotifications()
    {
        return $this->_notificationService->removeAllNotifications();
    }
}
