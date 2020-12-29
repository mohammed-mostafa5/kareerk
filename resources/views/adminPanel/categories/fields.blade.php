<ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
    @php $i = 1; @endphp
    @foreach ( config('langs') as $locale => $name)

    <li class="nav-item">
        <a class="nav-link {{request('languages') == $locale ?'active':''}}" id="{{$name}}-tab" data-toggle="pill" href="#{{$name}}" role="tab" aria-controls="{{$name}}" aria-selected="{{ request('languages') == $locale  ? 'true' : 'false'}}">{{$name}}</a>
    </li>

    @php $i = 0; @endphp
    @endforeach
</ul>
<div class="tab-content" id="pills-tabContent">
    @php $i = 1; @endphp
    @foreach ( config('langs') as $locale => $name)

    <div class="tab-pane fade {{request('languages') == $locale?'show active':''}}" id="{{$name}}" role="tabpanel" aria-labelledby="{{$name}}-tab">
        <!-- Name Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('name', __('models/categories.fields.name').':') !!}
            {!! Form::text($locale . '[name]', isset($category)? $category->translate($locale)->name : '' , ['class' =>
            'form-control', 'placeholder' => $name . ' name']) !!}
        </div>

    </div>

    @php $i = 0; @endphp
    @endforeach

    <!-- Parent Category Field -->
    {{-- <div class="form-group col-sm-6">
        {!! Form::label('type', __('models/categories.fields.type').':') !!}
        <select name="parent_id" id="type" class="form-control">
            <option value="">Parent Category</option>
            @forelse ($categories as $cate)

            <option value="{{ $cate->id }}" {{ isset($category)? $category->parent_id == $cate->id? 'selected' : '' : ''  }}>{{ $cate->name }}
    </option>
    @empty


    @endforelse
    </select>
</div> --}}



{{-- <!-- Parent Category Field -->
<div class="form-group col-sm-6">

    {!! Form::label('type', __('models/categories.fields.type').':') !!}
    <select name="parent_id" id="type" class="form-control">
        <option value="">Parent Category</option>
        @forelse ($categories as $parent)
        <option value="{{ $parent->id }}" {{ isset($category)? $category->parent_id == $parent->id? 'selected' : '' : ''  }}>{{ $parent->name }}
        </option>
        @if (isset($category->children))
        @foreach ( $parent->children as $child)
        <option value="{{ $child->id }}" {{ isset($category)? $category->parent_id == $child->id? 'selected' : '' : ''  }}>-- {{ $child->name }}
        </option>
        @endforeach
        @endif
        @empty

        @endforelse
    </select>
</div> --}}



<div class="form-group col-sm-6">
    {!! Form::label('photo', __('models/categories.fields.photo').':') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', __('models/categories.fields.status').':') !!}

    <label class="radio-inline">
        {!! Form::radio('status', "1", 'active') !!} active
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "0", null) !!} inactive
    </label>



</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.categories.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

</div>
