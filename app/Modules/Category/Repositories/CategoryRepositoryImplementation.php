<?php

namespace App\Modules\Category\Repositories;

use App\Modules\Category\DTOs\CategoryDTO;
use App\Modules\Category\DTOs\CategoryFilterDTO;
use App\Modules\Category\Enums\CacheKey;
use App\Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategoryRepositoryImplementation implements CategoryRepository
{
    public function get(CategoryFilterDTO $dto): Collection
    {
        return Cache::tags(CacheKey::TAG_NAME->value)
            ->remember(
                CacheKey::LIST->value,
                CacheKey::ttl(),
                function () use ($dto) {
                    $query = Category::query();

                    if ($dto->name) {
                        $query->where('name', '%LIKE%', $dto->name)
                            ->orWhere('description', '%LIKE%', $dto->name);
                    }

                    if ($dto->active) {
                        $query->where('active', $dto->active);
                    }

                    if ($dto->sort) {
                        $query->orderByRaw($dto->sort . ' DESC');
                    }

                    $query->pagination($dto->pageSize);
                }
            );
    }

    public function store(CategoryDTO $payload): Category
    {
        return DB::transaction(function () use ($payload) {
            $category = Category::create($payload->toArray());

            return $category;
        });
    }

    function update(Category $category, CategoryDTO $dto): Category
    {
        return DB::transaction(function () use ($category, $dto) {

            $category->fill($dto->toArray());
            $category->save();

            return $category;
        });
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}
