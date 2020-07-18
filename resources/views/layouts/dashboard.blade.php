@if($role == 1)
    <div class="dashboard">
        <div class="menu">
            <a href="{{ route('course.index') }}">
                <div class="menu-item tran-all">{{ __('Courses') }}</div>
            </a>
            <a href="{{ route('lesson.index') }}">
                <div class="menu-item tran-all">{{ __('Lessons') }}</div>
            </a>
            <a href="{{ route('users.lessons') }}">
                <div class="menu-item tran-all">{{ __('Activate') }}</div>
            </a>
        </div>
    </div>
@elseif($role == 2)
    <div class="dashboard">
        <div class="menu">
            <a href="{{ route('course.index') }}">
                <div class="menu-item tran-all">{{ __('Courses') }}</div>
            </a>
            <a href="{{ route('lesson.index') }}">
                <div class="menu-item tran-all">{{ __('Lessons') }}</div>
            </a>
            <a href="{{ route('users.lessons') }}">
                <div class="menu-item tran-all">{{ __('Activate') }}</div>
            </a>
        </div>
    </div>
@elseif($role == 3)
    <div class="dashboard">
        <div class="menu">
            <a href="{{ route('users.lessons') }}">
                <div class="menu-item tran-all">{{ __('Lessons') }}</div>
            </a>
        </div>
    </div>
@else

@endif
