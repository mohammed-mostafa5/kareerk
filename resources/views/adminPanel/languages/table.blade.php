<div class="table-responsive-sm">
    <table class="table table-striped" id="languages-table">
        <thead>
            <tr>
                <th>@lang('models/languages.fields.name')</th>
                <th>@lang('models/languages.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
            <tr>
                <td>{{ $language->name }}</td>
                <td>{{ $language->status }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.languages.destroy', $language->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('languages view')
                        <a href="{{ route('adminPanel.languages.show', [$language->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('languages edit')
                        <a href="{{ route('adminPanel.languages.edit', [$language->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('languages destroy')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
