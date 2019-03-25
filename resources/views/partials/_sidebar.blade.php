<!-- Left Sidebar -->
<?php

?>
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>

                <li class="submenu">
                    <a  href="{{route('home')}}" class="{{ Request::is('home') ? 'active' : '' }}"><i class="fa fa-fw fa-home"></i><span> Dashboard </span> </a>
                </li>

                <li class="submenu">
{{--                    <a href="#" class="{{ request()->is('sites/*/edit') ? 'active' : '' }}"><i class="fa fa-fw fa-star"></i> <span> Customer </span> <span--}}
                    <a href="#" ><i class="fa fa-fw fa-star"></i> <span> Customers </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('customer.create')}}" class="{{ Request::is('customer/create') ? 'active' : '' }}">Add New Customer</a></li>
                        <li><a href="{{route('customer.index')}}" class="{{ Request::is('customer') ? 'active' : '' }}">View All Customers</a></li>
                        <li><a href="{{route('customer-address.index')}}" class="{{ Request::is('customer-address') ? 'active' : '' }}">View Customer Address Details</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-tv"></i> <span> Products </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('product.create')}}" class="{{ Request::is('product/create') ? 'active' : '' }}">Add New Product</a></li>
                        <li><a href="{{route('product.index')}}" class="{{ Request::is('product') ? 'active' : '' }}">View All Product</a></li>
                        <li><a href="{{route('productUpdate')}}" class="{{ Request::is('product-update') ? 'active' : '' }}">Update All Product</a></li>
                        <li><a href="{{route('product-detail.create')}}" class="{{ Request::is('product-detail/create') ? 'active' : '' }}">Add Item Details</a></li>
                        <li><a href="{{route('product-detail.index')}}" class="{{ Request::is('product-detail') ? 'active' : '' }}">View All Item Details</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-file-text-o"></i> <span> Stock Movements </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('stock-movement.index')}}" class="{{ Request::is('stock-movement') ? 'active' : '' }}">View All Product Movements</a></li>
                        <li><a href="{{route('adjustment.index')}}" class="{{ Request::is('adjustment') ? 'active' : '' }}">View All Product Adjustmets</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-th"></i> <span> Sell </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('sell.create')}}" class="{{ Request::is('sell/create') ? 'active' : '' }}">Sell Product</a></li>
                        <li><a href="{{route('sell.index')}}" class="{{ Request::is('sell') ? 'active' : '' }}">View All Sell</a></li>
                        <li><a href="{{route('viewAllDues')}}" class="{{ Request::is('view-all-dues') ? 'active' : '' }}">View All Dues</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-money"></i> <span> Payments </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('addCash')}}" class="{{ Request::is('add-cash') ? 'active' : '' }}">Add Cash</a></li>
                        <li><a href="{{route('cashAgainstCheque')}}" class="{{ Request::is('cash-against-cheque') ? 'active' : '' }}">Add Cash Against Cheque</a></li>
                        <li><a href="{{route('addCheque')}}" class="{{ Request::is('add-cheque') ? 'active' : '' }}">Add Cheque</a></li>
                        <li><a href="{{route('allCheque')}}" class="{{ Request::is('all-cheque') ? 'active' : '' }}">View All Cheque</a></li>
                        {{--<li><a href="{{route('payment.index')}}">View All Sell</a></li>--}}
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-area-chart"></i> <span> Expenses </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('expense.create')}}" class="{{ Request::is('expense/create') ? 'active' : '' }}">Add Expense</a></li>
                        <li><a href="{{route('expense.index')}}" class="{{ Request::is('expense') ? 'active' : '' }}">View All Expenses</a></li>
                        <li><a href="{{route('daily_expense_report')}}" class="{{ Request::is('daily-expense-report') ? 'active' : '' }}">Daily Expense Report</a></li>
                        <li><a href="{{route('daily_financial_report')}}" class="{{ Request::is('daily-financial-report') ? 'active' : '' }}">Daily Financial Report</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-file-text-o"></i> <span> View Reports </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('singleReport')}}" class="{{Request::is('single-customer-sales-report')? 'active' : ''}}">Customers Report</a></li>
                        <li><a href="{{route('productsReport')}}" class="{{Request::is('products-report')? 'active' : ''}}">Products Report</a></li>
                    </ul>
                </li>


            @if(Auth::user()->role == 7)
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-th"></i> <span> Manage Users </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('user.create')}}" class="{{ Request::is('user/create') ? 'active' : '' }}">Add New User</a></li>
                        <li><a href="{{route('user.index')}}" class="{{ Request::is('user') ? 'active' : '' }}">View User Details</a></li>
                        {{--<li><a href="range-sliders.html">Edit User</a></li>--}}
                        {{--<li><a href="tree-view.html">Change Passoword</a></li>--}}
                    </ul>
                </li>
                @endif



                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-key"></i> <span> Password </span> <span
                                class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('changePassword')}}" class="{{ Request::is('change-password') ? 'active' : '' }}">Change Password</a></li>
                    </ul>
                </li>

                {{--<li class="submenu">--}}
                    {{--<a href="#" class="pro"><i class="fa fa-fw fa-image"></i> <span> Backup </span> <span--}}
                                {{--class="menu-arrow"></span></a>--}}
                    {{--<ul class="list-unstyled">--}}
                        {{--<li><a href="media-fancybox.html"><span class="label radius-circle bg-danger float-right">Important</span>--}}
                                {{--Backup in USB </a></li>--}}
                        {{--<li><a href="media-masonry.html">Perform Online Backup</a></li>--}}
                        {{--<li><a href="media-lightbox.html">View Last Saved Copies</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->