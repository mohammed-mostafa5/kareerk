<div class="table-responsive-sm">
    <table class="table table-striped" id="countries-table">
        <thead>
            <tr>
                <th>@lang('models/countries.fields.id')</th>
                <th>@lang('models/countries.fields.name')</th>
                <th>@lang('models/countries.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>{{ $country->name }}</td>
                <td>{{ $country->status }}</td>
                <td>

                    {!! Form::open(['route' => ['adminPanel.countries.destroy', $country->id], 'method' => 'delete'])
                    !!}
                    <div class='btn-group'>
                        @can('countries view')
                        <a href="{{ route('adminPanel.countries.show', [$country->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('countries edit')
                        <a href="{{ route('adminPanel.countries.edit', [$country->id]) . "?languages=en" }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('countries destroy')
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
