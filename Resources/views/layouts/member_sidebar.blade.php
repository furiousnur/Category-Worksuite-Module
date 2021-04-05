@section('filter-section')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav tabs-vertical">
                <li class="tab {{ Route::is('member.category.index') ? 'active' : '' }}">
                    <a href="{{ route('member.category.index') }}" class="waves-effect">
                        <span class="hide-menu">@lang('category::app.projectCategory')</span>
                    </a>
                </li>
                <li class="tab {{ Route::is('member.task-category.index') ? 'active' : '' }}">
                    <a href="{{ route('member.task-category.index') }}" class="waves-effect">
                        <span class="hide-menu">@lang('category::app.taskCategory')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection