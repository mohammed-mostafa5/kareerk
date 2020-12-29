<div class="table-responsive-sm">
    <table class="table table-striped" id="socialLinks-table">
        <thead>
            <tr>
                <th>@lang('models/socialLinks.fields.name')</th>
                <th>@lang('models/socialLinks.fields.link')</th>
                <th>@lang('models/socialLinks.fields.status')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($socialLinks as $socialLink)
            <tr>
                <td>{{ $socialLink->name }}</td>
            <td>{{ $socialLink->link }}</td>
            <td>{{ $socialLink->status }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.socialLinks.destroy', $socialLink->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.socialLinks.show', [$socialLink->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @can('socialLinks edit')
                            
                        <a href="{{ route('adminPanel.socialLinks.edit', [$socialLink->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                       
                        {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!} --}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>