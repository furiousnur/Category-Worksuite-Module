@section('filter-section')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav tabs-vertical">
                <li class="tab {{ Route::is('employee.category.index') ? 'active' : '' }}">
                    <a href="{{ route('employee.category.index') }}" class="waves-effect">
                        <span class="hide-menu">@lang('category::app.projectCategory')</span>
                    </a>
                </li>
                {{--<li class="tab {{ Route::is('admin.devices.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.devices.create') }}" class="waves-effect">
                        <span class="hide-menu"> @lang('device::app.addDevice')</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
@endsection