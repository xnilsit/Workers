<?php declare(strict_types=1);

namespace App\Modules\TimeTracking;

enum TimeSheetEntryType: int
{
    case WORK = 1;
    case HOLIDAY = 2;
    case SICK_LEAVE = 3;
    case VACATION = 4;
}