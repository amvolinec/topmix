@if($role == 1)
    <div class="menu">
        <a href="{{ route('course.index') }}"><div class="menu-item tran-all">{{ __('Courses') }}</div></a>
        <a href="{{ route('lesson.index') }}"><div class="menu-item tran-all">{{ __('Lessons') }}</div></a>
    </div>
@elseif($role == 2)
    <div class="menu">
        <div class="menu-item tran-all"><a href="{{ route('course.index') }}">{{ __('Courses') }}</a></div>
        <div class="menu-item tran-all><a href="{{ route('lesson.index') }}">{{ __('Lessons') }}</a></div>
    </div>
@else
    <div class="menu-item tran-all><a href="{{ route('lesson.index') }}">{{ __('Lessons') }}</a></div>
@endif
