<div class="headerbar">

    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="index.php" class="logo"><img alt="Logo" src="{{asset('./assets/images/logo.png')}}" /> <span>Mostofa Steel</span></a>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none"  href="{{route('expense.create')}}" role="button" aria-haspopup="false" aria-expanded="false">
                    <span>Expenses</span>
                </a>
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">--}}
                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5><small>Record All Your Expense Here</small></h5>--}}
                    {{--</div>--}}

                    {{--<!-- item-->--}}
                    {{--<a target="_blank" href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">=> Add New Expense</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a target="_blank" href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0"> => View / Edit </p>--}}
                    {{--</a>--}}
                    {{--<a target="_blank" href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">=> Reports </p>--}}
                    {{--</a>--}}

                    {{--<!-- All-->--}}
                    {{--<a title="" target="_blank" href="" class="dropdown-item notify-item notify-all">--}}
                        {{--<i class="fa fa-link"></i>--}}
                    {{--</a>--}}

                {{--</div>--}}
            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none"  href="{{route('sell.create')}}" role="button" aria-haspopup="false" aria-expanded="false">
                    <span>Sale</span>
                </a>
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">--}}
                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5><small>Record All Your Sales Here </small></h5>--}}
                    {{--</div>--}}

                    {{--<!-- item-->--}}
                    {{--<a target="_blank" href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">=> Add New Sales</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a target="_blank" href="https://www.pikeadmin.com/pike-admin-pro" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--=> Edit / View Sales--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<a target="_blank" href="https://www.pikeadmin.com/pike-admin-pro" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--=> Reports--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- All-->--}}
                    {{--<a title="Clcik to visit Pike Admin Website" target="_blank" href="https://www.pikeadmin.com" class="dropdown-item notify-item notify-all">--}}
                        {{--<i class="fa fa-link"> Helpdesk</i>--}}
                    {{--</a>--}}

                {{--</div>--}}
            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none"  href="{{route('addCheque')}}" role="button" aria-haspopup="false" aria-expanded="false">
                    <p class="notify-details ml-0">
                        Cheque
                    </p>
                </a>
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">--}}
                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5><small><span class="label label-danger pull-xs-right">12</span>Perform all Cheque Transaction</small></h5>--}}
                    {{--</div>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--Add new cheque--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--View / Edit Cheque transaction--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--Reports on Cheque Transactions--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- All-->--}}
                    {{--<a href="#" class="dropdown-item notify-item notify-all">--}}
                        {{--View All--}}
                    {{--</a>--}}

                {{--</div>--}}
            </li>
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none"  href="{{route('addCash')}}" role="button" aria-haspopup="false" aria-expanded="false">
                    <p class="notify-details ml-0">
                        Cash
                    </p>
                </a>
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">--}}
                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5><small><span class="label label-danger pull-xs-right">12</span>Perform all Cheque Transaction</small></h5>--}}
                    {{--</div>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--Add new cheque--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--View/Edit Cheque transaction--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<p class="notify-details ml-0">--}}
                            {{--Reports on Cheque Transactions--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- All-->--}}
                    {{--<a href="#" class="dropdown-item notify-item notify-all">--}}
                        {{--View All--}}
                    {{--</a>--}}

                {{--</div>--}}
            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fa fa-fw fa-bell-o"></i><span class="notif-bullet"></span>
                </a>
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">--}}
                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5><small><span class="label label-danger pull-xs-right">5</span>Allerts</small></h5>--}}
                    {{--</div>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<div class="notify-icon bg-faded">--}}
                            {{--<img src="{{asset('assets/images/avatars/avatar2.png')}}" alt="img" class="rounded-circle img-fluid">--}}
                        {{--</div>--}}
                        {{--<p class="notify-details">--}}
                            {{--<b>John Doe</b>--}}
                            {{--<span>User registration</span>--}}
                            {{--<small class="text-muted">3 minutes ago</small>--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<div class="notify-icon bg-faded">--}}
                            {{--<img src="{{asset('assets/images/avatars/avatar3.png')}}" alt="img" class="rounded-circle img-fluid">--}}
                        {{--</div>--}}
                        {{--<p class="notify-details">--}}
                            {{--<b>Michael Cox</b>--}}
                            {{--<span>Task 2 completed</span>--}}
                            {{--<small class="text-muted">12 minutes ago</small>--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- item-->--}}
                    {{--<a href="#" class="dropdown-item notify-item">--}}
                        {{--<div class="notify-icon bg-faded">--}}
                            {{--<img src="{{asset('assets/images/avatars/avatar4.png')}}" alt="img" class="rounded-circle img-fluid">--}}
                        {{--</div>--}}
                        {{--<p class="notify-details">--}}
                            {{--<b>Michelle Dolores</b>--}}
                            {{--<span>New job completed</span>--}}
                            {{--<small class="text-muted">35 minutes ago</small>--}}
                        {{--</p>--}}
                    {{--</a>--}}

                    {{--<!-- All-->--}}
                    {{--<a href="#" class="dropdown-item notify-item notify-all">--}}
                        {{--View All Allerts--}}
                    {{--</a>--}}

                {{--</div>--}}
            </li>

            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets/images/avatars/admin.png')}}" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Hello, {{ Auth::user()->name }} </small> </h5>
                    </div>

                    <!-- item-->
                    <a href="pro-profile.html" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>

                    {{--<a href="{{route('changePassword')}}" class="dropdown-item notify-item">--}}
                        {{--<i class="fa fa-key"></i> <span>Change Password </span>--}}
                    {{--</a>--}}

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"
                    >
                        <i class="fa fa-power-off"></i> <span>Logout</span>
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <!-- item-->
                    {{--<a target="_blank" href="#" class="dropdown-item notify-item">--}}
                        {{--<i class="fa fa-external-link"></i> <span>Helpdesk</span>--}}
                    {{--</a>--}}
                </div>
            </li>

            <li class="list-inline-item dropdown notif">
                <p class="text-white" id="date"></p>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </li>
        </ul>

    </nav>
</div>