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
<div class="header-bottom">
    <div class="container">
        <div class="header-bottom__inner">
            <ul class="header-bottom__items">
                @foreach($items as $item)
                    <li>
                        <a href="{{ $item['link']  }}" class="text_medium header-bottom__item">{!! $item['name'] !!}</a>
                    </li>
                @endforeach
            </ul>
            <select size="1" class="forms_select header-bottom__items-mobile">
                @foreach($items as $item)
                    <option value="{{ $item['name'] }}">{!! $item['name'] !!}</option>
                @endforeach
            </select>
            <div class="header-bottom__buttons">
                <div class="header-bottom__edit">
                    @include('icons.edit')
                </div>
                <div class="header-bottom__dropdown">
                    <a href="#" class="button button_light button_mini header-bottom__button">Задать вопрос</a>
                    <a href="#" class="button button_light button_mini header-bottom__button">Написать статью</a>
                </div>
            </div>
        </div>
    </div>
</div>
