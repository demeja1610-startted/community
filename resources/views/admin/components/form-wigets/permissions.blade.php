<div class="permissions-widget-wrapper {{ $wrapperClasses ?? '' }}">
    <div class="card card-secondary w-100 permissions-widget">
        <div class="card-header permissions-widget__header">
            <h3 class="card-title">{!! $title !!}</h3>
        </div>

        <div class="card-body permissions-widget__body">
            <div class="permissions-widget__buttons">
                <select class="select2" multiple="" name="permissions[]" data-placeholder="{!! __('Выберите право') !!}">
                    @foreach ($permissions as $permission)
                        <option
                            value="{{ $permission->id }}"
                            @isset($model)
                                @if ($model->isRelation('permissions'))
                                    @php
                                        $isSelected = $model->permissions->first(function ($item) use ($permission){
                                            return $item->id == $permission->id;
                                        });
                                    @endphp
                                    @if($isSelected))
                                        selected=""
                                    @endif
                                @endif
                            @endisset

                            @if(old('permissions') !== null)
                                @php
                                    $isSelected = in_array($permission->id, old('permissions'));
                                @endphp
                                @if($isSelected))
                                    selected=""
                                @endif
                            @endif
                        >{!! __('permissions.' . $permission->name) !!}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
