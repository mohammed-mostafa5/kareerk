<div class="table-responsive-sm">
    <table class="table table-striped" id="blogs-table">
        <thead>
            <tr>
                <th>@lang('models/blogs.fields.id')</th>
                <th>@lang('models/blogs.fields.photo')</th>
                <th>@lang('models/blogs.fields.title')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td><img src="{{ $blog->photo_path}}" alt="{{ $blog->title }}" width="150"></td>
                <td>{{ $blog->translateOrNew('en')->title}}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.blogs.destroy', $blog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.blogs.show', [$blog->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.blogs.edit', [$blog->id]) . "?languages=en"  }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
