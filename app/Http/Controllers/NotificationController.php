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
        $notifiactions = Notification::where('status', 'new')->orderBy('created_at')->get();
        return view('notification', compact('notifiactions'));
    }

    public function changeStatus(Notification $notification){

        $notification->status = 'done';
        $notification->save();

        // return redirect('notification');
        return response('200');
    }

}