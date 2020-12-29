<div class="table-responsive-sm">
    <table class="table table-striped" id="images-table">
        <thead>
            <tr>
                <th>@lang('models/images.fields.page_id')</th>
                <th>@lang('models/images.fields.photo')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($images as $images)
            <tr>
                <td>{{ $images->page->name }}</td>
                <td>
                <img src="{{ asset('uploads/images/original/'. $images->photo)}}" alt="{{$images->page->name}}">
                </td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.images.destroy', $images->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.images.show', [$images->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.images.edit', [$images->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>