@extends('base.dashboard_portal')

@section('content')
    <!-- Page Heading -->
    <nav style="--bs-breadcrumb-divider: '>'; background-color: white;" aria-label="breadcrumb">
        <ol class="breadcrumb bg-light" >
            <li class="breadcrumb-item">
                @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('member.portal') }}">Dashboard</a>
                @endif
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Notifications</li>
        </ol>
    </nav>

    <!--End Page Heading -->
    @if(count($notifications) > 0)
        <div class="card">
            <div class="card-header">
                <h5>Current Notifications ({{ count($notifications) }})</h5>
            </div>
            <div class="card-body">
                @foreach ($notifications as $notification)
                    {{ $notification['created_at'] }}
                    <h6>
                        <strong>[{{ $notification->data['sender'] }}]</strong> {!! $notification->data['message'] !!} on {{ \Carbon\Carbon::parse($notification['time'])->format('j M, Y H:m') }}

                        <button class="btn badge bg-info text-white" id="mark-as-read" data-id="{{ $notification['id'] }}">mark as read</button>
                    </h6>
                    <hr>
                @endforeach
            </div>
            <div class="card-footer">
                <button type="submit" id="read-all" class="btn btn-sm btn-danger">mark all as read</button>
            </div>
        </div>

    @else
        <h4 class="text-center text-danger">No notification found!!!</h4>
    @endif

    <script>
        $(document).on('click', '#read-all', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ url('delete/all')}}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log(response);
                    if(response.status === 200){
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                        toastr.success("all notifications marked as read");
                    }else{
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                        toastr.error("Oops! An error occurred");
                    }

                    location.reload();
                },

                failure: function (response) {
                    console.log("something went wrong");
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '#mark-as-read', function (e) {
            e.preventDefault();
            var notification_id = $(this).attr('data-id');

            $.ajax({
                url: '{{ url('notification/delete')}}/'+notification_id,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'notification_id' : notification_id,
                },
                success: function (response) {
                    if(response.status === 200){
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                        toastr.success("Marked as read");
                    }else{
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                        toastr.error("Oops! An error occurred");
                    }

                    location.reload();
                },

                failure: function (response) {
                    console.log("something went wrong");
                }
            });
        });
    </script>

@endsection
