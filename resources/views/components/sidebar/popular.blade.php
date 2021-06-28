<div class="sidebar-popular">
    @for ($i = 1; $i <= 4; $i++)
        <div class="sidebar-popular__item {{ $i != 4 ? 'mrgn24-bottom' : '' }}">

            <a href="#" class="sidebar-popular__title">
                Как сделать лендинг своими руками за 30 минут
            </a>

            <div class="sidebar-popular__bottom mrgn12-top">

                <div class="sidebar-popular__bottom-date">
                    11 июня в 14:38
                </div>

                <div>
                    <a href="#" class="button button_light button_mini sidebar-popular__bottom-message">
                        @include('icons.message')
                        Обсудить
                    </a>
                </div>

            </div>

        </div>
    @endfor
</div>
