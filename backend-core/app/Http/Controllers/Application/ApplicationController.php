<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CreateApplicationRequest;
use App\Http\Requests\Application\DeleteApplicationRequest;
use App\Http\Requests\Application\ShowApplicationRequest;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Http\Resources\Application\ApplicationCollection;
use App\Http\Resources\Application\ApplicationResource;
use App\Http\Resources\BooleanResource;
use App\Models\Application;
use App\Services\Application\CreateApplicationService;
use App\Services\Application\DeleteApplicationService;
use App\Services\Application\ShowApplicationService;
use App\Services\Application\UpdateApplicationService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApplicationController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ApplicationCollection::collection(Application::query()->cursorPaginate());
    }

    /**
     * Метод создания
     *
     *
     * @param CreateApplicationRequest $request
     * @param CreateApplicationService $createApplicationService
     * @return BooleanResource
     */
    public function create(
        CreateApplicationRequest $request,
        CreateApplicationService $createApplicationService
    ): BooleanResource {
        return new BooleanResource($createApplicationService->create($request->getApplication()));
    }

    /**
     * Метод просмотра одной записи
     *
     * @param ShowApplicationRequest $request
     * @param ShowApplicationService $showApplicationService
     * @return ApplicationResource
     */
    public function show(
        ShowApplicationRequest $request,
        ShowApplicationService $showApplicationService
    ): ApplicationResource {
        return new ApplicationResource($showApplicationService->show($request->getApplicationId()));
    }

    /**
     * Метод обновления
     *
     * @param UpdateApplicationRequest $request
     * @param UpdateApplicationService $applicationService
     * @return BooleanResource
     * @throws \Exception
     */
    public function update(
        UpdateApplicationRequest $request,
        UpdateApplicationService $applicationService
    ): BooleanResource
    {
        return new BooleanResource($applicationService->update($request->getApplication(),$request->getApplicationId()));
    }

    /**
     * @param DeleteApplicationRequest $request
     * @param DeleteApplicationService $deleteApplicationService
     * @return BooleanResource
     */
    public function destroy(DeleteApplicationRequest $request, DeleteApplicationService $deleteApplicationService): BooleanResource
    {
        return new BooleanResource($deleteApplicationService->delete($request->getApplicationId()));
    }
}
