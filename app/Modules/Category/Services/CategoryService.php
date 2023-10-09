<?php

namespace App\Modules\Category\Services;

use App\Modules\Category\DTOs\CategoryDTO;
use App\Modules\Category\DTOs\CategoryFilterDTO;
use App\Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryService
{
    public function get(CategoryFilterDTO $dto): Collection;

    public function store(CategoryDTO $dto): Category;

    public function update(Category $category, CategoryDTO $dto): Category;

    public function delete(Category $category): void;
}
