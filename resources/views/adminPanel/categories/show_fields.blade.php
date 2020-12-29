<!-- Photo Field -->
<div class="form-group show">
    {!! Form::label('photo', __('models/categories.fields.photo').':') !!}
    <span><img src="{{asset("uploads/images/thumbnail/$category->photo")}}" alt="{{$category->name}}"></span>
</div>

@foreach ( config('langs') as $locale => $name)
<!-- Name Field -->
<div class="form-group show">
    {!! Form::label('name', $name . ' ' . __('models/categories.fields.name').':') !!}
    <span>{{ $category->translate($locale)->name }}</span>

</div>
@endforeach



<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/categories.fields.type').':') !!}
    <span>{{ $category->parent_id == null ? 'Parent' : 'Child' }}</span>
</div>
<!-- Status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/categories.fields.status').':') !!}
    <span>{{ $category->status ? 'Active' : 'Inactive' }}</span>
</div>
