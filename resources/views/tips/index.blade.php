@extends('base.portal_index')

@section('content')
    <!-- Page Heading -->
    <div style="--bs-breadcrumb-divider: '>';" class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb bg-light mb-0 text-gray-800" >
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Tips</li>
        </ol>
    </div>

    @if(count($tips) > 0)

        @include('tips.partials.tips-table')

    @else
        <p class="text-center text-danger">No recent tips were found</p>
    @endif
@endsection
