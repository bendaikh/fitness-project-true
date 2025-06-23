<?php

namespace App\Enums;

enum SubscriptionPlanType: string {
    case DAILY = 'daily';
    case MONTHLY = 'monthly';
    case QUARTERLY = 'quarterly';
    case HALF_YEARLY = 'half-yearly';
    case YEARLY = 'yearly';

    public static function getDays($val): int
    {
        return [
            self::DAILY->value => 1,
            self::MONTHLY->value => 30,
            self::QUARTERLY->value => 90,
            self::HALF_YEARLY->value => 180,
            self::YEARLY->value => 365,
        ][$val] ?? 0;
    }

    public static function getAll(): array
    {
        return [
            self::DAILY->value,
            self::MONTHLY->value,
            self::QUARTERLY->value,
            self::HALF_YEARLY->value,
            self::YEARLY->value,
        ];
    }
}
