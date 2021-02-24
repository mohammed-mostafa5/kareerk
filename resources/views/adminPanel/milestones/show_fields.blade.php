<!-- id Field -->
<div class="form-group show">
    {!! Form::label('id', __('models/milestones.fields.id').':') !!}
    <p>{{ $milestone->id }}</p>
</div>

<!-- job Field -->
<div class="form-group show">
    {!! Form::label('job', __('models/milestones.fields.job').':') !!}
    @if ($milestone->proposal)
    <a href="{{route('adminPanel.jobs.show',  $milestone->proposal->job->id)}}">
        <p>{{ $milestone->proposal->job->title ?? ''}}</p>
    </a>
    @endif
</div>

<!-- freelancer Field -->
<div class="form-group show">
    {!! Form::label('freelancer', __('models/milestones.fields.freelancer').':') !!}
    @if ($milestone->proposal)
    <a href="{{route('adminPanel.freelancers.show',  $milestone->proposal->freelancer->user->id)}}">
        {{ $milestone->proposal->freelancer->user->name ?? ''}}
    </a>
    @endif
</div>

<!-- client Field -->
<div class="form-group show">
    {!! Form::label('client', __('models/milestones.fields.client').':') !!}
    @if ($milestone->proposal)
    <a href="{{route('adminPanel.clients.show',  $milestone->proposal->job->client->user->id)}}">
        {{ $milestone->proposal->job->client->user->name ?? ''}}
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

<!-- title Field -->
<div class="form-group show">
    {!! Form::label('title', __('models/milestones.fields.title').':') !!}
    <p>{{ $milestone->title }}</p>
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
    @case(4) Not Solved @break
    @case(5) Payment Done @break
    @case(6) Client Refunded @break
    @default
    @endswitch
</div>

<!-- expected_start Field -->
<div class="form-group show">
    {!! Form::label('expected_start', __('models/milestones.fields.expected_start').':') !!}
    <p>{{ $milestone->expected_start }}</p>
</div>

<!-- payment_at Field -->
<div class="form-group show">
    {!! Form::label('payment_at', __('models/milestones.fields.payment_at').':') !!}
    <p>{{ $milestone->payment_at }}</p>
</div>

<!-- finished_at Field -->
<div class="form-group show">
    {!! Form::label('finished_at', __('models/milestones.fields.finished_at').':') !!}
    <p>{{ $milestone->finished_at }}</p>
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
<div class="clearfix"></div>
<hr>
<div class="actions">

    {{-- Under Review --}}
    @if ($milestone->admin_status == 1 && $milestone->status == 4)
    {!! Form::open(['route' => ['adminPanel.milestones.underReview', $milestone->id], 'method' => 'patch', 'class' => 'd-inline']) !!}
    @can('milestones under_review')
    {!! Form::button('Under review', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
    @endcan
    {!! Form::close() !!}
    @endif

    {{-- Solved --}}
    @if ($milestone->admin_status == 2 && $milestone->status == 4)
    {!! Form::open(['route' => ['adminPanel.milestones.solved', $milestone->id], 'method' => 'patch', 'class' => 'd-inline']) !!}
    @can('milestones solved')
    {!! Form::button('Solved', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
    @endcan
    {!! Form::close() !!}
    @endif

    {{-- Not Solved --}}
    @if ($milestone->admin_status == 2 && $milestone->status == 4)
    {!! Form::open(['route' => ['adminPanel.milestones.notSolved', $milestone->id], 'method' => 'patch', 'class' => 'd-inline']) !!}
    @can('milestones notSolved')
    {!! Form::button('Not Solved', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
    @endcan
    {!! Form::close() !!}
    @endif

    {{-- Pay To Freelancer --}}
    @if ($milestone->status == 3 && in_array($milestone->admin_status, [1,3]))
    {!! Form::open(['route' => ['adminPanel.milestones.pay', $milestone->id], 'method' => 'patch', 'class' => 'd-inline']) !!}
    @can('milestones pay')
    {!! Form::button('Pay for Freelancer', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) !!}
    @endcan
    {!! Form::close() !!}
    @endif

    {{-- Refund --}}
    @if ($milestone->admin_status == 4 && $milestone->status == 4)
    {!! Form::open(['route' => ['adminPanel.milestones.refund', $milestone->id], 'method' => 'patch', 'class' => 'd-inline']) !!}
    @can('milestones refund')
    {!! Form::button('Refund Client', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
    @endcan
    {!! Form::close() !!}
    @endif
</div>
