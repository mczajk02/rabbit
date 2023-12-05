<?php

namespace App\Repository;

use DateTime;

class NotificationEntity
{
    
    // protected readonly \DateTimeInterface $updated_at;

    public function __construct(
        // public readonly ?int $id = null,
        public readonly string $body,
        public readonly string $type,
        public string $status = 'new',
        public readonly DateTime $created_at = new \DateTime(),
        public DateTime $updated_at = new \DateTime(),

    ) {
 
    }

    public function makeDone():void{
        $this->status = 'done';
        $this->updated_at = new \DateTime();
    }

    // public function setStatus(string $status):self{
    //     $this->status = $status;

    //     return $this;
    // }

    // public function setUpdatedAt(\DateTimeInterface $datetime){
    //     ///
    // }

    //logika zmiany danych
}
