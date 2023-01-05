<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Teams</th>
            <th>League</th>
            <th>Correct Tip</th>
            <th>Correct Odd</th>
            <th>Match Time</th>
            <th>Is Vip</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tips as $tip)
            <tr>
                <td>
                    {{ $tip->team_a }}
                    <small>vs</small>
                    {{ $tip->team_b }}
                </td>
                <td>{{ $tip->country_league }}</td>
                <td>{{ $tip->correct_tip }}</td>
                <td>{{ $tip->correct_odd }}</td>
                <td>{{ $tip->match_time }}</td>
                <td class="text-center">
                    @if($tip->is_vip)
                        <i class="fa fa-check-circle text-success"></i>
                    @else
                        <i class="fa fa-times-circle text-danger"></i>
                    @endif
                </td>
                <td>
                    <a href="{{ route('tip.show.edit.form', $tip->id) }}">Edit</a> |
                    @include('tips.partials.delete-tip-modal')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center paginate-mobile">
    {{ $tips->links('pagination.custom_pagination') }}
</div>
