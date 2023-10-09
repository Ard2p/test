<?php

namespace App\Modules\Category\Repositories;

use App\Modules\Category\DTOs\CategoryDTO;
use App\Modules\Category\DTOs\CategoryFilterDTO;
use App\Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository
{
    public function get(CategoryFilterDTO $dto): Collection;

    public function store(CategoryDTO $payload): Category;

    public function update(Category $category, CategoryDTO $dto): Category;

    public function delete(Category $category): void;
}
