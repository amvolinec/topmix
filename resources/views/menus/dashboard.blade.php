<div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <div class="absolute-wrapper"></div>
    <!-- Menu -->
    <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('forms.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <hr>
                    <li><a href="#"><i class="far fa-chart-bar"></i> Link</a></li>
                    <!-- Dropdown-->
                    <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl1"><i class="fas fa-cogs"></i> Settings <i
                                class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>

                        <!-- Dropdown level 1 -->
                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fas fa-sitemap"></i> Users</a></li>

                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </div>
</div>
