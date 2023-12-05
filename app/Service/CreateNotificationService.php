<?php

namespace App\Service;

use App\Models\Notification;
use App\Repository\NotificationEntity;
use App\Repository\NotificationRepository;

class CreateNotificationService implements CreateNotificationInterface
{
   public function __construct(private NotificationRepository $repository){

   }
   
   public function __invoke(array $data){

    $notificationEntity = new NotificationEntity(
      $data['type'],
      $data['body']
    );
    
    $this->repository->save($notificationEntity);

   }
}
