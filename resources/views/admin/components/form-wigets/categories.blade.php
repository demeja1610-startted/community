<div class="categories-widget-wrapper {{ $wrapperClasses ?? '' }}">
    <div class="card card-secondary w-100 categories-widget">
        <div class="card-header categories-widget__header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>

        <div class="card-body categories-widget__body">
            <div class="categories-widget__buttons">
                <select class="select2" multiple="" name="categories[]" data-placeholder="{!! __('Выберите категорию (необязательно)') !!}">
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @isset($model)
                                @if ($model->isRelation('categories'))
                                    @php
                                        $isSelected = $model->categories->first(function ($item) use ($category){
                                            return $item->id == $category->id;
                                        });
                                    @endphp
                                    @if($isSelected))
                                        selected=""
                                    @endif
                                @endif
                            @endisset

                            @if(old('categories') !== null)
                                @php
                                    $isSelected = in_array($category->id, old('categories'));
                                @endphp
                                @if($isSelected))
                                    selected=""
                                @endif
                            @endif
                        >{!! $category->title !!}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
