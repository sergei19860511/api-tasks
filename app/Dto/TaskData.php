<?php

namespace App\Dto;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

class TaskData extends Data
{
    public string $title;

    public function __construct(
        #[WithoutValidation]
        string $title,
        string $description,
        public string $status,
        public string $deadline
    ) {
    }

    public static function rules(ValidationContext $context): array
    {
        return [
            'title' => ['min:5', 'max:20', 'required']
        ];
    }
}
