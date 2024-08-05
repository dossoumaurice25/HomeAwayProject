<?php

namespace App\Services;

use App\Models\Reservation;

class CommissionService
{
    const COMMISSION_RATE = 0.15;

    public static function calculateCommission(Reservation $reservation)
    {
        return $reservation->prix_total * self::COMMISSION_RATE;
    }
}