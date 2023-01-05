@extends('base.portal_index')

@section('content')
    <!-- Page Heading -->
    <div style="--bs-breadcrumb-divider: '>';" class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb bg-light mb-0 text-gray-800" >
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add Tip</li>
        </ol>
    </div>

    <div class="col-md-12">
        <form action="{{ route('tip.add') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Team A</label>
                    <input type="text" name="team_a" class="form-control" value="{{ old('team_a') }}" placeholder="Team A" aria-label="Team A">
                    @if ($errors->has('team_a'))
                        <div class="text-danger form-text"><small>{{ $errors->first('team_a') }}</small></div>
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Team B</label>
                    <input type="text" name="team_b" class="form-control" value="{{ old('team_b') }}" placeholder="Team B" aria-label="Team B">
                    @if ($errors->has('team_b'))
                        <div class="text-danger form-text"><small>{{ $errors->first('team_b') }}</small></div>
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Country/League</label>
                    <input type="text" name="country_league" class="form-control" placeholder="Country/League" value="{{ old('country_league') }}" aria-label="country_league">
                    @if ($errors->has('country_league'))
                        <div class="text-danger form-text"><small>{{ $errors->first('country_league') }}</small></div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="inputcorrecttip" class="form-label">Correct Tip</label>
                    <select name="correct_tip" id="correct_tip" class="form-select form-control" aria-label="Default select example" autofocus>
                        <!--<option selected>Select correct tip</option>-->
                        <option value="Home">Home</option>
                        <option value="Draw">Draw</option>
                        <option value="Away">Away</option>
                        <option value="G-G">G-G</option>
                        <option value="Over 1.5">Over 1.5</option>
                        <option value="Over 2.5">Over 2.5</option>
                        <option value="Under 2.5">Under 2.5</option>
                        <option value="Under 3.5">Under 3.5</option>
                        <option value="1or2">1or2</option>
                        <option value="1orX">1orX</option>
                        <option value="2orX">2orX</option>
                        <option value="Xor2">Xor2</option>
                    </select>
                    @if ($errors->has('correct_tip'))
                        <div class="text-danger form-text"><small>{{ $errors->first('correct_tip') }}</small></div>
                    @endif
                </div>

                <div class="col-md-3 mb-3">
                    <label for="inputcorrectodd" class="form-label">Correct Odd</label>
                    <input type="number" name="correct_odd" class="form-control" placeholder="enter correct odd" id="correct_odd">
                    @if ($errors->has('correct_odd'))
                        <div class="text-danger form-text"><small>{{ $errors->first('correct_odd') }}</small></div>
                    @endif
                </div>

                <div class="col-md-3 mb-3">
                    <label for="inputotherscore" class="form-label">Other Odd <small>(eg odd for 1or2,1orX,.. etc)</small></label>
                    <input type="number" name="other_score" class="form-control" placeholder="enter other score" id="inputotherscore">
                    @if ($errors->has('other_score'))
                        <div class="text-danger form-text"><small>{{ $errors->first('other_score') }}</small></div>
                    @endif
                </div>

                <div class="col-md-3">
                    <label for="inputmatchtime" class="form-label">Match Time</label>
                    <input type="datetime-local" name="match_time" class="form-control" placeholder="enter match time" id="inputmatchtime">
                    @if ($errors->has('match_time'))
                        <div class="text-danger form-text"><small>{{ $errors->first('match_time') }}</small></div>
                    @endif
                </div>
            </div>

            <div class="mb-3 mt-3 form-check">
                <input type="checkbox" class="form-check-input" id="vip_tips">
                <label id="vip_status_label" class="form-check-label text-primary" for="vip_status"><strong>Check for VIP tips</strong></label>
                <input type="hidden" name="vip_status" class="form-control">
            </div>

            <button type="submit" class="btn btn-secondary">Add Tip</button>
        </form>
    </div>
@endsection
