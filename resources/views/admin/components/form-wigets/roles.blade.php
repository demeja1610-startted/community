<div class="roles-widget-wrapper {{ $wrapperClasses ?? '' }}">
    <div class="card card-secondary w-100 roles-widget">
        <div class="card-header roles-widget__header">
            <h3 class="card-title">{!! $title !!}</h3>
        </div>

        <div class="card-body roles-widget__body">
            <div class="roles-widget__buttons">
                <select class="select2" multiple="" name="roles[]" data-placeholder="{!! __('Выберите роль') !!}">
                    @foreach ($roles as $role)
                        <option
                            value="{{ $role->id }}"
                            @isset($model)
                                @if ($model->isRelation('roles'))
                                    @php
                                        $isSelected = $model->roles->first(function ($item) use ($role){
                                            return $item->id == $role->id;
                                        });
                                    @endphp
                                    @if($isSelected))
                                        selected=""
                                    @endif
                                @endif
                            @endisset

                            @if(old('roles') !== null)
                                @php
                                    $isSelected = in_array($role->id, old('roles'));
                                @endphp
                                @if($isSelected))
                                    selected=""
                                @endif
                            @endif
                        >{!! __('roles.' . $role->name) !!}</option>
                    @endforeach
                </select>
                @error('roles')
                    <p class="text text-danger">{!! $message !!}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
