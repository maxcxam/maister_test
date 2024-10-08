<?php

namespace App\Enums;

enum Status: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'in progress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
    case DELETED = 'deleted';

    public function equals(Status $status): bool
    {
        return $status->value === $this->value;
    }
}
