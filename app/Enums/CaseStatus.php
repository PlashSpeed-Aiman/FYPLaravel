<?php

namespace App\Enums;

enum CaseStatus: string
{
    //OPEN,CLOSED,IN_PROGRESS
    case OPEN = 'open';
    case CLOSED = 'closed';
    case IN_PROGRESS = 'in_progress';

}
