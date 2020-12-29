<div class="table-responsive-sm">
    <table class="table table-striped" id="pages-table">
        <thead>
            <th>@lang('models/pages.fields.id')</th>
            <th>@lang('models/pages.fields.language')</th>
            <th>@lang('models/pages.fields.name')</th>
            <th>@lang('models/paragraphs.plural')</th>
            <th>@lang('models/images.plural')</th>
            <th>@lang('crud.action')</th>
        </thead>
        <tbody>
            @foreach($pages as $page)
            @php $i = 1; @endphp
            @foreach ( config('langs') as $locale => $name)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $name }}</td>
                <td>{{ $page->translate($locale)->name }}</td>

                <td>
                    <a href="{{ route('adminPanel.pages.paragraphs.index', $page->id) }}">
                        {{ $page->paragraph_count }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('adminPanel.pages.images.index', $page->id) }}">
                        {{ $page->image_count }}
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.pages.destroy', $page->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('pages view')
                        <a href="{{ route('adminPanel.pages.show', [$page->id]) }}" class='btn btn-ghost-success'>
                            <i class="fa fa-eye"></i>
                        </a>
                        @endcan
                        @can('pages edit')
                        <a href="{{ route('adminPanel.pages.edit', [$page->id]) . "?languages=$locale" }}" class='btn btn-ghost-info'>
                            <i class="fa fa-edit"></i>
                        </a>
                        @endcan
                        @can('pages destroy')
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
