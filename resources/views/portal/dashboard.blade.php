@extends('base.portal_index')

@section('content')

    <div style="--bs-breadcrumb-divider: '>';" class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb bg-light mb-0 text-gray-800" >
            <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>

            </li>
        </ol>

        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!--Count section --- >
{{--    @include('admin.dashboard.partials.count')--}}

{{--    @include('admin.dashboard.partials.charts')--}}

@endsection
