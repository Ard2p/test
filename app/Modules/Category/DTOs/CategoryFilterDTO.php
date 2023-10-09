<?php

namespace App\Modules\Category\DTOs;

use App\DTOs\BaseDTO;

class CategoryFilterDTO extends BaseDTO
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?bool   $active = null,
        public readonly ?int    $pageSize = null,
        public readonly ?string $sort = null
    )
    {
    }
}
