@section('filter-section')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav tabs-vertical">
                <li class="tab {{ Route::is('admin.category.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}" class="waves-effect">
                        <span class="hide-menu">@lang('category::app.projectCategory')</span>
                    </a>
                </li>
                <li class="tab {{ Route::is('admin.task-category.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.task-category.index') }}" class="waves-effect">
                        <span class="hide-menu">@lang('category::app.taskCategory')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection