<?php
namespace App\Services\Application;

use App\Models\Application;

class ShowApplicationService
{
    /**
     * @param int $id
     * @return Application
     */
    public function show(int $id): Application
    {
        return Application::query()->whereId($id)->first();
    }
}
