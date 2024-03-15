@extends(get_theme_dir('layouts.app', 'dashboard'))
@section('content')
    <div class="row">
        <div class="col-md-12x">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">@lang('messages.Perform_Action')</h3>
                </div>
                <div class="card-body">
                    <h3> {{ $page_title }}</h3>
                    <p>
                        @if ($type == 'country')
                            <hr>
                            <strong>@lang('messages.Delete') {{ trans_choice('messages.State', 2) }}: </strong>
                            @foreach (DB::table('states')->where('country_id', $location->id)->get() as $item)
                                {{ $item->name }},
                            @endforeach

                            <hr>
                            <strong>@lang('messages.Delete') @lang('messages.Cities'): </strong>
                            @foreach (DB::table('cities')->where('country_id', $location->id)->get() as $item)
                                {{ $item->name }},
                            @endforeach

                            <hr>
                            <strong>@lang('messages.Delete') {{ trans_choice('messages.Area', 2) }}:</strong>
                            @foreach (DB::table('areas')->where('country_id', $location->id)->get() as $item)
                                {{ $item->name }},
                            @endforeach
                        @endif

                        @if ($type == 'state' || $type == 'city')
                            {{ country_name($location->country_id) }}
                        @endif

                        @if ($type == 'state')
                            <hr>
                            <strong>@lang('messages.Delete') @lang('messages.Cities'): </strong>
                            @foreach (DB::table('cities')->where('state_id', $location->id)->get() as $item)
                                {{ $item->name }},
                            @endforeach

                            <hr>
                            <strong>@lang('messages.Delete') {{ trans_choice('messages.Area', 2) }}:</strong>
                            @foreach (DB::table('areas')->where('state_id', $location->id)->get() as $item)
                                {{ $item->name }},
                            @endforeach
                        @endif

                        @if ($type == 'city')
                            <hr>
                            <strong>@lang('messages.Delete') {{ trans_choice('messages.Area', 2) }}:</strong>
                            @foreach (DB::table('areas')->where('city_id', $location->id)->get() as $item)
                                {{ $item->name }},
                            @endforeach
                        @endif


                    </p>

                </div>
                <div class="card-footer  py-6 px-9">
                    <a href="{{ route('dashboard.areas') }}"
                        class="btn btn-light btn-active-light-primary me-2">@lang('messages.Cancel')</a>

                    <a href="{{ route("dashboard.location.delete", ['type' => $type, 'id' => $location->id, 'confirm' => 1]) }}"
                        class="btn btn-danger ml-1">
                        <span class="save">@lang('messages.Delete')</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('#sel_country').select2();
            $('#sel_state').select2();
            $('#sel_city').select2();
            // State Change
            $('#sel_country').change(function() {

                // Department id
                var id = $(this).val();

                // Empty the dropdown
                // $('#sel_country').find('option').not(':first').remove();
                $('#sel_state').find('option').remove();
                $('#sel_city').find('option').remove()
                // AJAX request 
                $.ajax({
                    url: '{{ url('dashboard/address/getstates') }}/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('#sel_state').find('option').not(':first').remove();
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {

                                //var id = response['data'][i].id;
                                var name = response['data'][i].state;

                                var option = "<option value='" + name + "'>" + name +
                                    "</option>";

                                $("#sel_state").append(option);
                            }
                            //$('#sel_state').select2();
                        }

                    }
                });
            });

            // State Change
            $('#sel_state').change(function() {

                // Department id
                var id = $(this).val();

                // Empty the dropdown
                $('#sel_city').find('option').remove()

                // AJAX request 
                $.ajax({
                    url: '{{ url('dashboard/address/getcity') }}/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        $('#sel_city').find('option').not(':first').remove();
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {

                                //var id = response['data'][i].id;
                                var name = response['data'][i].city;

                                var option = "<option value='" + name + "'>" + name +
                                    "</option>";

                                $("#sel_city").append(option);
                            }
                            // $('#sel_city').select2({
                            //     //dropdownParent: $('#address-create')
                            // });
                        }

                    }
                });
            });

        });
    </script>
@endpush
