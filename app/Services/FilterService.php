<?php

namespace App\Services;

use App\Enum\AllowedFiltersEnum;

class FilterService
{
    public function sort(array $data, $items)
    {
        foreach (array_keys($data) as $item) {
            if (!in_array($data[$item], AllowedFiltersEnum::values())) {
                $filter[$item] = 'default';
            } else {
                $filter[$item] = $data[$item];
            }
        }

        foreach (array_keys($filter) as $item) {
            switch ($filter[$item]) {
                case 'popular':
                    $items->orderByDesc('views');
                    break;
                case 'on':
                    $items->has('comments', '=', 0);
                    break;
                case 'default':
                    $items->orderBy('created_at', 'ASC');
                    break;
            }
        }
        return $items;
    }
}
