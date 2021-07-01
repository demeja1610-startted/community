<div class="tags-widget-wrapper {{ $wrapperClasses ?? '' }}">
    <div class="card card-secondary w-100 tags-widget">
        <div class="card-header tags-widget__header">
            <h3 class="card-title">{!! $title !!}</h3>
        </div>

        <div class="card-body tags-widget__body">
            <div class="tags-widget__buttons">
                <select class="select2" multiple="" name="tags[]" data-placeholder="{!! __('Выберите теги (необязательно)') !!}">
                    @foreach ($tags as $tag)
                        <option
                            value="{{ $tag->id }}"
                            @isset($model)
                                @if ($model->isRelation('tags'))
                                    @php
                                        $isSelected = $model->tags->first(function ($item) use ($tag){
                                            return $item->id == $tag->id;
                                        });
                                    @endphp
                                    @if($isSelected))
                                        selected=""
                                    @endif
                                @endif
                            @endisset

                            @if(old('tags') !== null)
                                @php
                                    $isSelected = in_array($tag->id, old('tags'));
                                @endphp
                                @if($isSelected))
                                    selected=""
                                @endif
                            @endif
                        >{!! $tag->title !!}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
