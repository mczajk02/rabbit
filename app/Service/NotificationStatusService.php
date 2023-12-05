<?php

namespace App\Service;

use App\Models\Notification;
use App\Repository\NotificationRepository;

class NotificationStatusService
{

    public function __construct(private NotificationRepository $repository)
    {
        
    }

    public function markNotificationDone(int $id)
    {
       $notification = $this->repository->findById($id);
       $notification->makeDone();
       $this->repository->save($notification);
       
    }
}
//tu mamy logikę aplikacji, logika bi