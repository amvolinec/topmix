@if($role == 1)
    <div class="dashboard">
        <div class="menu">
            <a href="{{ route('course.index') }}">
                <div class="menu-item tran-all"><i class="fas fa-graduation-cap"></i>
                    <span>{{ __('Courses') }}</span>
                </div>
            </a>
            <a href="{{ route('lesson.index') }}">
                <div class="menu-item tran-all"><i class="fab fa-leanpub"></i>
                    <span>{{ __('Lessons') }}</span>
                </div>
            </a>
            <a href="{{ route('users.lessons') }}">
                <div class="menu-item tran-all"><i class="fas fa-user-plus"></i>
                    <span>{{ __('Activate') }}</span>
                </div>
            </a>
        </div>
    </div>
@elseif($role == 2)
    <div class="dashboard">
        <div class="menu">
            <a href="{{ route('course.index') }}">
                <div class="menu-item tran-all"><i class="fas fa-graduation-cap"></i> {{ __('Courses') }}</div>
            </a>
            <a href="{{ route('lesson.index') }}">
                <div class="menu-item tran-all"><i class="fab fa-leanpub"></i> {{ __('Lessons') }}</div>
            </a>
            <a href="{{ route('users.lessons') }}">
                <div class="menu-item tran-all"><i class="fas fa-user-plus"></i> {{ __('Activate') }}</div>
            </a>
        </div>
    </div>
@else
    <div class="dashboard">
        <div class="menu">
            <a href="{{ route('users.lessons') }}">
                <div class="menu-item tran-all"><i class="fab fa-leanpub"></i>{{ __('Lessons') }}</div>
            </a>
        </div>
    </div>
@endif
