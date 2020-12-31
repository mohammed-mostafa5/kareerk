<div class="table-responsive-sm">
    <table class="table table-striped" id="skills-table">
        <thead>
            <tr>
                <th>@lang('models/skills.fields.service')</th>
                <th>@lang('models/skills.fields.name')</th>
                <th>@lang('models/skills.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->service->name }}</td>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->status }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.skills.destroy', $skill->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.skills.show', [$skill->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.skills.edit', [$skill->id]) . "?languages=en" }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
