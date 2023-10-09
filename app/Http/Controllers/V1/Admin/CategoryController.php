<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Responses\SuccessEmptyResponse;
use App\Http\Responses\SuccessResponse;
use App\Modules\Category\Enums\CategoryStatus;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Requests\CategoryFilterRequest;
use App\Modules\Category\Requests\StoreRequest;
use App\Modules\Category\Requests\UpdateRequest;
use App\Modules\Category\Resources\CategoryResource;
use App\Modules\Category\Services\CategoryService;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Админ
 * @subgroup Категории
 * @authenticated
 */
class CategoryController extends Controller
{
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    /**
     * Получение списка категорий
     * @bodyParam type string Тип фильтрации. Example: all|category|filters
     * @param CategoryFilterRequest $request
     * @return SuccessResponse
     */
    public function index(CategoryFilterRequest $request): SuccessResponse
    {
        $category = $this->categoryService->get($request->toDto());

        return new SuccessResponse(
            response: CategoryResource::collection($category),
            message: "Category list"
        );
    }

    /**
     * Создание категории
     *
     * @bodyParam name string required Название. Example: Название.
     * @bodyParam active boolean Активна ли. Example: true
     * @bodyParam description string required Описание. Example: Описание.
     * @responseFile status=201
     * @responseFile status=422
     * @param StoreRequest $request
     * @return SuccessResponse
     */
    public function store(StoreRequest $request): SuccessResponse
    {
        $createCategory = $this->categoryService->store($request->toDto());

        return new SuccessResponse(
            response: CategoryResource::make($createCategory),
            status: Response::HTTP_CREATED,
            message: "Category created"
        );
    }

    /**
     * Детали информация категории
     *
     * @urlParam id integer required ID категории. Example: 1
     * @param Category $category
     * @return SuccessResponse
     */
    public function show(Category $category): SuccessResponse
    {
        return new SuccessResponse(
            response: CategoryResource::make($category),
            message: "Category detail"
        );
    }

    /**
     * Обновление данных категории
     *
     * @bodyParam name string required Название. Example: Название.
     * @bodyParam active boolean Активна ли. Example: true
     * @bodyParam description string required Описание. Example: Описание.     
     * @responseFile status=201
     * @responseFile status=422
     * @param UpdateRequest $request
     * @param Category $category
     * @return SuccessResponse
     */
    public function update(UpdateRequest $request, Category $category): SuccessResponse
    {
        $updateCategory = $this->categoryService->update($category, $request->toDto());

        return new SuccessResponse(
            response: CategoryResource::make($updateCategory),
            message: "Category update"
        );
    }

    /**
     * Удаление категории
     *
     * @urlParam id integer required ID категории. Example: 1
     * @param Category $category
     * @return SuccessEmptyResponse
     */
    public function destroy(Category $category): SuccessEmptyResponse
    {
        $this->categoryService->delete($category);

        return new SuccessEmptyResponse(
            message: "Category deleted"
        );
    }
}
