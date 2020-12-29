<div class="table-responsive-sm">
    <table class="table " id="metas-table">
        <thead>
            <th>@lang('models/metas.fields.id')</th>
            <th>@lang('models/metas.fields.language')</th>
            <th>@lang('models/metas.fields.page')</th>
            <th>@lang('models/metas.fields.title')</th>
            <th>@lang('models/metas.fields.description')</th>
            <th>@lang('models/metas.fields.keywords')</th>
            <th>@lang('crud.action')</th>
        </thead>

        <tbody>
            @foreach($metas as $meta)
            @php $i = 1; @endphp
            @foreach ( config('langs') as $locale => $name)
            <tr>
                <td>{{ $meta->id }}</td>
                <td>{{ $name }}</td>
                <td> {{ $meta->page }} </td>
                <td>{{ $meta->translate($locale)->title }}</td>
                <td>{{ $meta->translate($locale)->description }}</td>
                <td>{{ $meta->translate($locale)->keywords }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.metas.destroy', $meta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('metas view')
                        <a href="{{ route('adminPanel.metas.show', [$meta->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('metas edit')
                        <a href="{{ route('adminPanel.metas.edit', [$meta->id]) . "?languages=$locale" }}" class='btn btn-ghost-info'>
                            <i class="fa fa-edit"></i>
                        </a>
                        @endcan
                        @can('metas destroy')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @php $i = 0; @endphp
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>
