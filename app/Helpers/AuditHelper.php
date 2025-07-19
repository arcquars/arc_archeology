<?php

namespace App\Helpers;

use App\Models\Audit;
use App\Models\HumanRemainCard;

class AuditHelper
{

//    public static function getAutidableTypeAndId($type, $id){
//        return Audit::query()
//            ->where('auditable_type', '=', $type)
//            ->join('projects', 'audits.auditable_id', '=', 'projects.id')
//            ->join('users', 'audits.user_id', '=', 'users.id')
//            ->where('projects.id', '=', $id);
//    }
}
