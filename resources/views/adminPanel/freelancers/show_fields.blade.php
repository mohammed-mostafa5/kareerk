@if ($freelancer->photo)
<!-- Photo Field -->
<div class="form-group show">
    {!! Form::label('photo', __('models/freelancers.fields.photo').':') !!}
    <img src="{{ $freelancer->thumbnail_path }}" alt="{{$freelancer->name}}">
</div>
@endif


<!-- Main Service Id Field -->
<div class="form-group show">
    {!! Form::label('main_service_id', __('models/freelancers.fields.main_service_id').':') !!}
    <p>{{ $freelancer->mainService->name ?? ''}}</p>
</div>

<!-- Expertise Level Field -->
<div class="form-group show">
    {!! Form::label('expertise_level', __('models/freelancers.fields.expertise_level').':') !!}
    @switch($freelancer->expertise_level)
    @case(1)
    Entry level
    @break
    @case(2)
    Intermediate
    @break
    @case(3)
    Expert
    @break
    @default

    @endswitch
    {{-- <p>{{ $freelancer->expertise_level }}</p> --}}
</div>

<!-- Hourly Rate Field -->
<div class="form-group show">
    {!! Form::label('hourly_rate', __('models/freelancers.fields.hourly_rate').':') !!}
    <p>{{ $freelancer->hourly_rate }}</p>
</div>

<!-- Title Field -->
<div class="form-group show">
    {!! Form::label('title', __('models/freelancers.fields.title').':') !!}
    <p>{{ $freelancer->title }}</p>
</div>

<!-- Overview Field -->
<div class="form-group show">
    {!! Form::label('overview', __('models/freelancers.fields.overview').':') !!}
    <p>{{ $freelancer->overview }}</p>
</div>

<!-- City Field -->
<div class="form-group show">
    {!! Form::label('city', __('models/freelancers.fields.city').':') !!}
    <p>{{ $freelancer->city }}</p>
</div>

<!-- Address Field -->
<div class="form-group show">
    {!! Form::label('address', __('models/freelancers.fields.address').':') !!}
    <p>{{ $freelancer->address }}</p>
</div>

<!-- Created At Field -->
<div class="form-group show">
    {!! Form::label('created_at', __('models/freelancers.fields.created_at').':') !!}
    <p>{{ $freelancer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group show">
    {!! Form::label('updated_at', __('models/freelancers.fields.updated_at').':') !!}
    <p>{{ $freelancer->updated_at }}</p>
</div>

{{-- Educations --}}
@if ($freelancer->education->count() > 0)

<div class="clearfix"></div>
<br>
<h3>Education</h3>
<br>
@foreach ($freelancer->education as $education)

<!-- school -->
<div class="form-group show">
    {!! Form::label('school', 'School : ') !!}
    <p>{{ $education->school }}</p>
</div>
<!-- study -->
<div class="form-group show">
    {!! Form::label('study', 'Study : ') !!}
    <p>{{ $education->study }}</p>
</div>
<!-- degree -->
<div class="form-group show">
    {!! Form::label('degree', 'Degree : ') !!}
    <p>{{ $education->degree }}</p>
</div>
<!-- from_date -->
<div class="form-group show">
    {!! Form::label('from_date', 'From : ') !!}
    <p>{{ $education->from_date }}</p>
</div>
<!-- to_date -->
<div class="form-group show">
    {!! Form::label('to_date', 'To : ') !!}
    <p>{{ $education->to_date }}</p>
</div>
<!-- description -->
<div class="form-group show">
    {!! Form::label('description', 'Description : ') !!}
    <p>{{ $education->description }}</p>
</div>
<div class="clearfix"></div>
<hr>
@endforeach
@endif


{{-- Employments --}}
@if ($freelancer->employment->count() > 0)

<div class="clearfix"></div>
<br>
<h3>Employment</h3>
<br>
@foreach ($freelancer->employment as $employment)

<!-- country -->
<div class="form-group show">
    {!! Form::label('country', 'Country : ') !!}
    <p>{{ $employment->country->name ?? '' }}</p>
</div>
<!-- city -->
<div class="form-group show">
    {!! Form::label('city', 'City : ') !!}
    <p>{{ $employment->city }}</p>
</div>
<!-- title -->
<div class="form-group show">
    {!! Form::label('title', 'Title : ') !!}
    <p>{{ $employment->title }}</p>
</div>
<!-- from_date -->
<div class="form-group show">
    {!! Form::label('from_date', 'From : ') !!}
    <p>{{ $employment->from_date }}</p>
</div>
<!-- still_working -->
<div class="form-group show">
    {!! Form::label('still_working', 'Still Working ? : ') !!}
    <p>{{ $employment->still_working ? 'Yes' : 'No' }}</p>
</div>
<!-- to_date -->
<div class="form-group show">
    {!! Form::label('to_date', 'To : ') !!}
    <p>{{ $employment->to_date }}</p>
</div>
<!-- description -->
<div class="form-group show">
    {!! Form::label('description', 'Description : ') !!}
    <p>{{ $employment->description }}</p>
</div>
<div class="clearfix"></div>
<hr>
@endforeach
@endif

{{-- languages --}}
@if ($freelancer->languages->count() > 0)

<div class="clearfix"></div>
<br>
<h3>Languages</h3>
<br>
@foreach ($freelancer->languages as $language)

<!-- language -->
<div class="form-group show">
    {!! Form::label('language', 'Language : ') !!}
    <p>{{ $language->name }}</p>
</div>
<!-- level -->
<div class="form-group show">
    {!! Form::label('level', 'Level : ') !!}
    <p>{{ $language->pivot->level ?? '' }}</p>
</div>

<div class="clearfix"></div>
<hr>
@endforeach
@endif

{{-- services --}}
@if ($freelancer->services->count() > 0)

<div class="clearfix"></div>
<br>
<h3>Services</h3>
<br>
<!-- main_service -->
<div class="form-group show">
    {!! Form::label('main_service', 'Main Service : ') !!}
    <p>{{ $freelancer->mainservice->name ?? '' }}</p>
</div>
<div class="clearfix"></div>
<hr>
@foreach ($freelancer->services as $service)

<!-- service -->
<div class="form-group show">
    {!! Form::label('service', 'Service : ') !!}
    <p>{{ $service->name }}</p>
</div>
@endforeach
@endif


{{-- skills --}}
@if ($freelancer->skills->count() > 0)

<div class="clearfix"></div>
<hr>

<br>
<h3>Skills</h3>
<br>
@foreach ($freelancer->skills as $skill)

<!-- skill -->
<div class="form-group show">
    {!! Form::label('skill', 'Skill : ') !!}
    <p>{{ $skill->name }}</p>
</div>

@endforeach
@endif
