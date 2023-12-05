<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::where('status', 'new')->orderBy('created_at')->get();
        return view('notification', ['notifications' => $notifications, 'lastNotificationId' => $notifications->last()]);
    }

    public function changeStatus(Notification $notification){

        $notification->status = 'done';
        $notification->save();

        // return redirect('notification');
        return response('200');
    }

    public function reciveNew($id){

        $newMessagess = Notification::where('id','>', $id)->orderBy('created_at')->get();
        // dd($newMessagess);

        return response()->json($newMessagess, 200);
    }

}