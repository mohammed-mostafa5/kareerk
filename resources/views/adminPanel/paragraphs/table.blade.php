<div class="table-responsive-sm">
    <table class="table table-striped" id="paragraphs-table">
        <thead>
            <tr>
                <th>@lang('models/paragraphs.fields.id')</th>
                <th>@lang('models/paragraphs.fields.text')</th>
                <th>@lang('models/paragraphs.fields.page_id')</th>
                <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($paragraphs as $paragraph)
        @php $i = 1; @endphp
        @foreach (config('langs') as $locale => $name)

            
        <tr>
            {{-- {{dd($paragraph)}} --}}
            <td>{{ $paragraph->id }}</td>
            <td>{{ $paragraph->translateOrNew($locale)->text }}</td>
            <td>{{ $paragraph->page->name }}</td>
            <td>
                @if ($i == 1)
                {!! Form::open(['route' => ['adminPanel.paragraphs.destroy', $paragraph->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('adminPanel.paragraphs.show', [$paragraph->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    <a href="{{ route('adminPanel.paragraphs.edit', [$paragraph->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                </div>
                {!! Form::close() !!}
                @endif
            </td>
        </tr>
        @php $i = 0; @endphp
        @endforeach
        @endforeach
        </tbody>
    </table>
</div>