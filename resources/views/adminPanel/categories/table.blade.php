<div class="table-responsive-sm">
    <table class="table table-striped" id="categories-table">
        <thead>
            <tr>
                <th>@lang('models/metas.fields.id')</th>
                <th>@lang('models/metas.fields.language')</th>
                <th>@lang('models/categories.fields.type')</th>
                <th>@lang('models/categories.fields.name')</th>
                <th>@lang('models/categories.fields.photo')</th>
                <th>@lang('models/categories.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            @php $i = 1;@endphp
            @foreach ( config('langs') as $locale => $name)
            <tr>
                <td>{{ $category->id}}</td>
                <td>{{ $name }}</td>
                <td>{{$i ? $category->parent_id == null ? 'Parent' : 'Child' : '' }}</td>
                <td>{{ $category->translate($locale)->name }}</td>
                <td>
                    @if ($i)
                    <img src="{{$category->photo_path}}" alt="{{$category->name}}">
                    @endif
                </td>
                <td>{{$i ? $category->status ? 'Active' : 'Inactive' : '' }}</td>

                <td>
                    {!! Form::open(['route' => ['adminPanel.categories.destroy', $category->id], 'method' => 'delete'])
                    !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.categories.show', [$category->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.categories.edit', [$category->id]) . "?languages=$locale" }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
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
