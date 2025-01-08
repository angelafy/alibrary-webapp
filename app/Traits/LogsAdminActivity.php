<?php

namespace App\Traits;

use App\Models\AdminActivity;

trait LogsAdminActivity
{
    protected function logAdminActivity($action, $description)
    {
        AdminActivity::create([
            'admin_id' => auth()->id(),
            'action' => $action,
            'description' => $description
        ]);
    }
}