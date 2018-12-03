<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
				 @if(Auth::user()->role_name === 'Employee')
					 @php $user = App\Employee::find(Auth::user()->employee_id); @endphp
          	    	<img src="{{ asset('storage/imgs/'.$user->emp_image) }}" class="img-circle" alt="User Image" width="20%">
				 @else
					<img src="{{ asset('images/user.png') }}" class="img-circle" alt="User Image">
				 @endif
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right" style="width: 200px">
                            <li><a href="{{ url('/profile') }}"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/showAllNotifications') }}"><i class="material-icons">notifications</i>Notification Mails</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    		@csrf
                			</form></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>

                    <li <?php if($_SERVER['REQUEST_URI'] =='/home') echo "class='active'"; ?> ><a href="{{ url('/home') }}"><i class="material-icons">home</i><span>Home</span></a></li>
<!--                    <li <?php if($_SERVER['REQUEST_URI'] == '/users' || $_SERVER['REQUEST_URI'] == '/users/new' || $_SERVER['REQUEST_URI'] == '/users/new/{id}') echo "class='active'"; ?> ><a href="{{ url('/users') }}"><i class="material-icons">person</i><span>Users</span></a></li>	-->
					<li <?php if($_SERVER['REQUEST_URI'] =='/employees' || $_SERVER['REQUEST_URI'] == '/employees/new' || $_SERVER['REQUEST_URI'] == '/employees/new/{id}') echo "class='active'"; ?> ><a href="{{ url('/employees') }}"><i class="material-icons">person</i><span>Employees</span></a></li>
<!--                    <li <?php if($_SERVER['REQUEST_URI'] =='/companies') echo "class='active'"; ?> ><a href="{{ url('/companies') }}"><i class="material-icons">domain</i><span>Companies</span></a></li>-->
					<li <?php if($_SERVER['REQUEST_URI'] =='/calendar') echo "class='active'"; ?> ><a href="{{ url('/calendar') }}"><i class="material-icons">event_note</i><span>Calendar</span></a></li>
					<li <?php if($_SERVER['REQUEST_URI'] =='/salary') echo "class='active'"; ?> ><a href="{{ url('/salary') }}"><i class="material-icons">attach_money</i><span>Salary</span></a></li>
					<li <?php if($_SERVER['REQUEST_URI'] =='/report') echo "class='active'"; ?> ><a href="{{ url('/report') }}"><i class="material-icons">description</i><span>Report</span></a></li>
<!--
                    <li <?php if($_SERVER['REQUEST_URI'] =='/teams') echo "class='active'"; ?> ><a href="{{ url('/teams') }}"><i class="material-icons">group</i><span>Teams</span></a></li>
                    <li <?php if($_SERVER['REQUEST_URI'] =='/logActivity') echo "class='active'"; ?> ><a href="{{ url('/logActivity') }}"><i class="material-icons">assessment</i><span>Logs</span></a></li>
                    <li <?php if($_SERVER['REQUEST_URI'] =='/customers') echo "class='active'"; ?> ><a href="{{ url('/customers') }}"><i class="material-icons">person</i><span>Customers</span></a></li>
                    <li <?php if($_SERVER['REQUEST_URI'] =='/products') echo "class='active'"; ?> ><a href="{{ url('/products') }}"><i class="material-icons">shopping_cart</i><span>Products</span></a></li>
                    <li <?php if($_SERVER['REQUEST_URI'] =='/invoice') echo "class='active'"; ?> ><a href="{{ url('/invoice') }}"><i class="material-icons">receipt</i><span>Invoice</span></a></li>
-->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
<!--
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - 2018 Admin<b>Panel</b>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
-->
            <!-- #Footer -->
        </aside>