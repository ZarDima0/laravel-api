<?php

namespace App\Services\Application;

use App\Models\Application;

class DeleteApplicationService
{
    public function delete(int $id): bool
    {
        return Application::query()
            ->whereId($id)->delete();
    }
}
