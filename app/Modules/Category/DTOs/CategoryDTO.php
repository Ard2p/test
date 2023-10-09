<?php

namespace App\Modules\Category\DTOs;

use App\DTOs\BaseDTO;

class CategoryDTO extends BaseDTO
{
    public function __construct(
        public readonly array  $name,
        public readonly bool   $active,
        public readonly ?bool  $description       
    )
    {
    }
}
