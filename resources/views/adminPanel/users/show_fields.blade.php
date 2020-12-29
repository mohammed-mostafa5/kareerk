<!-- Id Field -->
<div class="form-group show">
    {!! Form::label('photo', __('models/users.fields.photo').':') !!}
    <img src="{{$user->photo_path}}" alt="{{$user->name}}" width="300">
</div>

<!-- user Name Field -->
<div class="form-group show">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <span>{{ $user->first_name }} {{ $user->last_name }}</span>
</div>

<!-- Email Field -->
<div class="form-group show">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <span>{{ $user->email }}</span>
</div>

<!-- Phone Field -->
<div class="form-group show">
    {!! Form::label('phone', __('models/users.fields.phone').':') !!}
    <span>{{ $user->phone }}</span>
</div>

<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/users.fields.created_at').':') !!}
    <span>{{ $user->created_at }}</span>
</div>
