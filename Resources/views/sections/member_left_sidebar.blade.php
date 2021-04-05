@if(user()->cans('view_category'))
<li>
    <a href="{{route('member.category.index')}}" class="waves-effect">
        <i class="fa fa-bus" aria-hidden="true"></i>
        <span class="hide-menu">@lang('category::app.title')</span>
    </a>
</li>
@endif