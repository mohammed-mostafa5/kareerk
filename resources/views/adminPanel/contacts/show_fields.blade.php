<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/contacts.fields.id').':') !!}
    <p>{{ $contact->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/contacts.fields.name').':') !!}
    <p>{{ $contact->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/contacts.fields.email').':') !!}
    <p>{{ $contact->email }}</p>
</div>

<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', __('models/contacts.fields.subject').':') !!}
    <p>{{ $contact->subject }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', __('models/contacts.fields.message').':') !!}
    <p>{{ $contact->message }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/contacts.fields.created_at').':') !!}
    <p>{{ $contact->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/contacts.fields.updated_at').':') !!}
    <p>{{ $contact->updated_at }}</p>
</div>

