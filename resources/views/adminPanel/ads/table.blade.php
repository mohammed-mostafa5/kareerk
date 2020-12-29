<div class="table-responsive-sm">
    <table class="table table-striped" id="ads-table">
        
        <thead>
            <tr>
                <th>@lang('models/ads.fields.photo')</th>
                <th>@lang('models/ads.fields.page')</th>
                <th>@lang('models/ads.fields.link')</th>
                <th >@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ads as $ad)
            <tr>
                <td>
                    <img src="{{asset('uploads/images/thumbnail/'. $ad->photo)}}" class="" style="width: 50px" alt="">
                </td>
                <td>{{ $ad->page }}</td>
                <td>{{ $ad->link }}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('adminPanel.ads.show', [$ad->id]) }}" class='btn btn-ghost-success'><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('adminPanel.ads.edit', [$ad->id]) }}" class='btn btn-ghost-info'><i
                                class="fa fa-edit"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>