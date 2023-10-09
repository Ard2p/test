<?php

namespace App\Modules\Category\Services;

use App\Modules\Attribute\Enums\CacheKey;
use App\Modules\Category\DTOs\CategoryDTO;
use App\Modules\Category\DTOs\CategoryFilterDTO;
use App\Modules\Category\Models\Category;
use App\Modules\Category\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryServiceImplementation implements CategoryService
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    )
    {
    }

    public function get(CategoryFilterDTO $dto): Collection
    {
        return $this->categoryRepository->get($dto);
    }

    public function store(CategoryDTO $dto): Category
    {
        return $this->categoryRepository->store($dto);
    }

    public function update(Category $category, CategoryDTO $dto): Category
    {
        return $this->categoryRepository->update($category, $dto);
    }

    public function delete(Category $category): void
    {
        $this->categoryRepository->delete($category);
    }
}
