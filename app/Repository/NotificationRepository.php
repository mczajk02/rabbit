<?php

namespace App\Repository;

use App\Models\Notification;

class NotificationRepository{
    public function save(NotificationEntity $notificationEntity){
        $notification = new Notification;
        
        $notification->type = $notificationEntity->type;
        $notification->body = $notificationEntity->body;
        $notification->created_at = $notificationEntity->created_at;
        $notification->updated_at = $notificationEntity->updated_at;
        $notification->status = $notificationEntity->status;


        $notification->save();
    }

    public function findById(int $id): NotificationEntity
    {
        $notification = Notification::findOrFail($id);

        return new NotificationEntity(
            $notification->body,
            $notification->type,
            $notification->status,
            $notification->created_at,
            $notification->updated_at
        );
    }
}