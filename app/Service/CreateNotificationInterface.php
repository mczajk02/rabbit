<?php
namespace App\Service;

interface CreateNotificationInterface{
    public function __invoke(array $data);
}