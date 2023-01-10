<?php

namespace App\Services\Notifications;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class NotificationService
{
    /**
     * @return Application|Factory|View
     */
    public function retrieveNotifications()
    {
        $owner = $this->checkLoggedUser();

        $notifications = $owner->unreadNotifications;

        return view('notifications.index', compact('notifications'));
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function removeNotification($request)
    {
        $notification_id = $request->notification_id;

        $owner = $this->checkLoggedUser();

        $unread = $owner->unreadNotifications->where('id', $notification_id)->first();
        if ($unread){
            $unread->markAsRead();
        }

        $data = array(
            'status'=>200,
            'message'=>'Marked as read',
        );

        return response()->json($data);
    }

    /**
     * @return JsonResponse
     */
    public function removeAllNotifications()
    {
        $user = $this->userDetails->get_logged_user_details();
        $user->notifications()->delete();

        $data = array(
            'status'=>200,
            'message'=>"all notifications marked as read",
        );

        return response()->json($data);
    }

    /**
     * @return Authenticatable|null
     */
    private function checkLoggedUser()
    {
        if (Auth::guard('admin')->check()){
            $owner = Auth::guard('admin')->user();
        }else{
            $owner = Auth::user();
        }

        return $owner;
    }
}
