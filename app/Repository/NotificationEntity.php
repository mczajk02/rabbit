<?php

namespace App\Repository;

use DateTime;

class NotificationEntity
{
    public int $id;
    public \DateTimeInterface $created_at;
    public \DateTimeInterface $updated_at;

    public function __construct(
        public readonly string $body,
        public readonly string $type
    ) {
     $this->created_at = new \DateTime();
     $this->updated_at = new \DateTime();
    }
}
