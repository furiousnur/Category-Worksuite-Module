@section('filter-section')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav tabs-vertical">
                @if(user()->can('create_category'))
                    <li class="tab {{ Route::is('admin.category.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.category.index') }}" class="waves-effect">
                            <span class="hide-menu">@lang('category::app.projectCategory')</span>
                        </a>
                    </li>
                @else
                    <li class="tab {{ Route::is('member.category.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.category.index') }}" class="waves-effect">
                            <span class="hide-menu">@lang('category::app.projectCategory')</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endsection