<!-- job Field -->
<div class="form-group show">
    {!! Form::label('job', __('models/milestones.fields.job').':') !!}
    @if ($milestone->proposal)
    <a href="{{route('adminPanel.jobs.show',  $milestone->proposal->job->id)}}">
        <p>{{ $milestone->proposal->job->title ?? ''}}</p>
    </a>
    @endif
</div>

<!-- duration Field -->
<div class="form-group show">
    {!! Form::label('duration', __('models/milestones.fields.duration').':') !!}
    <p>{{ $milestone->duration}}
        @switch($milestone->duration_type)
        @case(1) Hours @break
        @case(2) Days @break
        @case(3) Months @break
        @default
        @endswitch</p>
</div>

<!-- amount Field -->
<div class="form-group show">
    {!! Form::label('amount', __('models/milestones.fields.amount').':') !!}
    <p>{{ $milestone->amount }}</p>
</div>

<!-- Description Field -->
<div class="form-group show">
    {!! Form::label('description', __('models/milestones.fields.description').':') !!}
    <p>{{ $milestone->description }}</p>
</div>

<!-- status Field -->
<div class="form-group show">
    {!! Form::label('status', __('models/milestones.fields.status').':') !!}
    @switch($milestone->status)
    @case(1) New @break
    @case(2) Finished @break
    @case(3) Done @break
    @case(4) Refused/Problem @break
    @default
    @endswitch
</div>

<!-- admin_status Field -->
<div class="form-group show">
    {!! Form::label('admin_status', __('models/milestones.fields.admin_status').':') !!}
    @switch($milestone->admin_status)
    @case(1) New @break
    @case(2) Under review @break
    @case(3) Solved @break
    @default
    @endswitch
</div>

<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/milestones.fields.created_at').':') !!}
    <p>{{ $milestone->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/milestones.fields.updated_at').':') !!}
    <p>{{ $milestone->updated_at }}</p>
</div>
