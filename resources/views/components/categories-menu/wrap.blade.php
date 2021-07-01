@php
    $items = [
    ['name' => 'Все темы',
    'link' => '#'
    ],
    ['name' => 'Новости',
    'link' => '#'
    ],
    ['name' => 'Разработка',
    'link' => '#'
    ],
    ['name' => 'Администрирование',
    'link' => '#'
    ],
    ['name' => 'Дизайн',
    'link' => '#'
    ],
    ['name' => 'Маркетинг',
    'link' => '#'
    ],
    ['name' => 'Бизнес',
    'link' => '#'
    ],
    ['name' => 'Личный опыт',
    'link' => '#'
    ],
    ['name' => 'Гейминг',
    'link' => '#'
    ],
]
@endphp
<div class="categories-menu">
    <div class="container">
        <div class="categories-menu__inner">
            <ul class="categories-menu__items">
                @foreach($items as $item)
                    <li>
                        <a href="{{ $item['link']  }}" class="text_medium categories-menu__item">{!! $item['name'] !!}</a>
                    </li>
                @endforeach
            </ul>
            <select size="1" class="forms_select categories-menu__items-mobile">
                @foreach($items as $item)
                    <option value="{{ $item['name'] }}">{!! $item['name'] !!}</option>
                @endforeach
            </select>
            <div class="categories-menu__buttons">
                <div class="categories-menu__edit">
                    @include('icons.edit')
                </div>
                <div class="categories-menu__dropdown">
                    <a href="#" class="button button_light button_mini categories-menu__button">Задать вопрос</a>
                    <a href="#" class="button button_light button_mini categories-menu__button">Написать статью</a>
                </div>
            </div>
        </div>
    </div>
</div>
