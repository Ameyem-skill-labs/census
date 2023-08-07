@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">


            {{-- <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li> --}}
            <li>
                <a href="{{url('/')}}" >
                        <i class="fa fa-home"></i>
                        <span class="title">@lang('quickadmin.qa_home')</span>
                    </a>
                </li>

                @can('census_access')
                    <li class="{{ $request->segment(2) == 'censuses' | $request->segment(2) == 'addcensuses'
                    ? 'active active-sub' : '' }}">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span class="title">@lang('quickadmin.census.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                    
                        <ul class="treeview-menu">
                            @can('list_person_access')
                            <li class="{{ $request->segment(2) == 'censuses' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.people.index') }}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                        @lang('quickadmin.people.title')
                                    </span>
                                </a>
                            </li>
                            @endcan 
                            @can('list_villages_access')
                            <li class="{{ $request->segment(2) == 'villages' ? 'active active-sub' : '' }}">
                                <a href="{{ route('admin.villages.index') }}">
                                    <i class="fa fa-list"></i>
                                    <span class="title">
                                        @lang('quickadmin.listvillages.title')
                                    </span>
                                </a>
                            </li>
                            @endcan 

                           
                        </ul> {{-- --}}
                    </li>
                    @endcan 

            <!-- for OFFICE-MANAGEMENT-->
            @can('office_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.office-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    


                    @can('attendance_access')
                        <li class="treeview {{ $request->segment(2) == 'attendance'
                        | $request->segment(2) == 'addAttendance' | $request->segment(2) == 'search' | $request->segment(2) == 'attendances' 
                        ? 'active active-sub' : '' }}">
                            <a href="#">
                                    <i class="fa fa-calendar"></i>
                                    <span class="title">@lang('quickadmin.attendance.title')</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>

                            <ul class="treeview-menu"> 
                                @can('today_attendance_access')
                                <li class="{{ $request->segment(2) == 'attendance' ? 'active' : '' }}">
                                    <a href="{{ route('attendance') }}">
                                        <i class="fa fa-calendar-check-o"></i>
                                        <span class="title">
                                            @lang('quickadmin.todayattendance.title')
                                        </span>
                                    </a>
                                </li>
                                @endcan

                                @can('add_attendance_access')
                                    <li class="{{ $request->segment(2) == 'addAttendance' ? 'active active-sub' : '' }}">
  
                                        <a href="{{ route('addAttendance') }}">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <span class="title">
                                                @lang('quickadmin.addattendance.title')
                                            </span>
   
                                        </a>
                                        
                                    </li>
                                @endcan

                                @can('search_attendance_access')
                                <li class="{{ $request->segment(2) == 'search' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('search') }}">
                                        <i class="fa fa-calendar"></i>
                                        <span class="title">
                                            @lang('quickadmin.searchattendance.title')
                                        </span>
                                    </a>
                                </li>
                                @endcan

                                @can('list_attendance_access')
                                <li class="{{ $request->segment(2) == 'attendances' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('attendances') }}">
                                        <i class="fa fa-calendar"></i>
                                        <span class="title">
                                            @lang('quickadmin.listattendance.title')
                                        </span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </li>
                    @endcan
                
                
                    @can('employee_access')
                    <li class="{{ $request->segment(2) == 'employees' | $request->segment(2) == 'addemployee'
                    ? 'active active-sub' : '' }}">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="title">@lang('quickadmin.employees.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                    
                        <ul class="treeview-menu">
                            @can('list_employee_access')
                            <li class="{{ $request->segment(2) == 'employees' ? 'active active-sub' : '' }}">
                                <a href="{{ route('employee') }}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                        @lang('quickadmin.listemployees.title')
                                    </span>
                                </a>
                            </li>
                            @endcan

                            {{--@can('add_employee_access')
                            <li class="{{ $request->segment(2) == 'addemployee' ? 'active active-sub' : '' }}">
                                <a href="{{ route('addemployee') }}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                        @lang('quickadmin.addemployees.title')
                                    </span>
                                </a>
                            </li>
                            @endcan--}}
                        </ul>
                    </li>
                    @endcan
                
               
                    @can('tasks_access')
                    <li class="{{ $request->segment(2) == 'tasks' | $request->segment(2) == 'addtask'
                    ? 'active active-sub' : '' }}">
                        <a href="#">
                            <i class="fa fa-file"></i>
                            <span class="title">@lang('quickadmin.tasks.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            @can('list_tasks_access')
                            <li class="{{ $request->segment(2) == 'tasks' ? 'active' : '' }}">
                                <a href="{{ route('task') }}">
                                    <i class="fa fa-file"></i>
                                    <span class="title">
                                        @lang('quickadmin.listtasks.title')
                                    </span>
                                </a>
                            </li>
                            @endcan

                            @can('add_tasks_access')
                            <li class="{{ $request->segment(2) == 'addtask' ? 'active' : '' }}">
                                <a href="{{ route('addtask') }}">
                                    <i class="fa fa-file"></i>
                                    <span class="title">
                                        @lang('quickadmin.addtasks.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                
                    @can('own_tasks_access')
                    <li class="{{ $request->segment(2) == 'mytasks' ? 'active active-sub' : '' }}">
                        <a href="#">
                            <i class="fa fa-file"></i>
                            <span class="title">@lang('quickadmin.owntasks.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                    
                            @can('my_tasks_access')
                            <li class="{{ $request->segment(2) == 'mytasks' ? 'active active-sub' : '' }}">
                                <a href="{{ route('mytask') }}">
                                    <i class="fa fa-file"></i>
                                    <span class="title">
                                        @lang('quickadmin.mytasks.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

    <!--for USER-MANAGEMENT-->
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                    <a href="{{ route('admin.roles.index') }}">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">
                            @lang('quickadmin.roles.title')
                        </span>
                    </a>
                </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            @lang('quickadmin.users.title')
                        </span>
                    </a>
                    {{--<ul class="treeview-menu">
                        @can('list_employee_access')
                        <li class="{{ $request->segment(2) == 'employees' ? 'active active-sub' : '' }}">
                            <a href="{{ route('employee') }}">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    @lang('quickadmin.listemployees.title')
                                </span>
                            </a>
                        </li>
                        @endcan
                        @can('add_employee_access')
                        <li class="{{ $request->segment(2) == 'addemployee' ? 'active active-sub' : '' }}">
                            <a href="{{ route('addemployee') }}">
                                <i class="fa fa-user"></i>
                                <span class="title">
                                    @lang('quickadmin.addemployees.title')
                                </span>
                            </a>
                        </li>
                        @endcan
                    </ul>--}}
                </li>
                @endcan
                </ul>
            </li>
            @endcan
    <!-- for EXPENSE-MANAGEMENT -->
            @can('expense_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span class="title">@lang('quickadmin.expense-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                    @can('expense_category_access')
                    <li class="{{ $request->segment(2) == 'expense_categories' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.expense_categories.index') }}">
                            <i class="fa fa-list"></i>
                            <span class="title">
                                @lang('quickadmin.expense-category.title')
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('income_category_access')
                    <li class="{{ $request->segment(2) == 'income_categories' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.income_categories.index') }}">
                            <i class="fa fa-list"></i>
                            <span class="title">
                                @lang('quickadmin.income-category.title')
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('income_access')
                    <li class="{{ $request->segment(2) == 'incomes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.incomes.index') }}">
                            <i class="fa fa-arrow-circle-right"></i>
                            <span class="title">
                                @lang('quickadmin.income.title')
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('expense_access')
                    <li class="{{ $request->segment(2) == 'expenses' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.expenses.index') }}">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span class="title">
                                @lang('quickadmin.expense.title')
                            </span>
                        </a>
                    </li>
                    @endcan

                    @can('monthly_report_access')
                    <li class="{{ $request->segment(2) == 'monthly_reports' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.monthly_reports.index') }}">
                            <i class="fa fa-line-chart"></i>
                            <span class="title">
                                @lang('quickadmin.monthly-report.title')
                            </span>
                        </a>
                    </li>
                    @endcan


                </ul>
            </li>
            @endcan
    <!-- for OFFICE-MANAGEMENT-->
          {{--@can('office_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.office-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('attendance_access')
                        <li class="treeview {{ $request->segment(2) == 'attendance'
                        | $request->segment(2) == 'addAttendance' | $request->segment(2) == 'search' | $request->segment(2) == 'attendances' 
                        ? 'active active-sub' : '' }}">
                            <a href="#">
                                    <i class="fa fa-calendar"></i>
                                    <span class="title">@lang('quickadmin.attendance.title')</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>

                            <ul class="treeview-menu"> 
                                @can('today_attendance_access')
                                <li class="{{ $request->segment(2) == 'attendance' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('attendance') }}">
                                        <i class="fa fa-calendar-check-o"></i>
                                        <span class="title">
                                            @lang('quickadmin.todayattendance.title')
                                        </span>
                                    </a>
                                </li>
                                @endcan

                                @can('add_attendance_access')
                                    <li class="{{ $request->segment(2) == 'addAttendance' ? 'active active-sub' : '' }}">
  
                                        <a href="{{ route('addAttendance') }}">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <span class="title">
                                                @lang('quickadmin.addattendance.title')
                                            </span>
   
                                        </a>
                                        
                                    </li>
                                @endcan

                                @can('search_attendance_access')
                                <li class="{{ $request->segment(2) == 'search' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('search') }}">
                                        <i class="fa fa-calendar"></i>
                                        <span class="title">
                                            @lang('quickadmin.searchattendance.title')
                                        </span>
                                    </a>
                                </li>
                                @endcan

                                @can('list_attendance_access')
                                <li class="{{ $request->segment(2) == 'attendances' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('attendances') }}">
                                        <i class="fa fa-calendar"></i>
                                        <span class="title">
                                            @lang('quickadmin.listattendance.title')
                                        </span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </li>
                    @endcan
                
                
                    @can('employee_access')
                    <li class="{{ $request->segment(2) == 'employees' | $request->segment(2) == 'addemployee'
                    ? 'active active-sub' : '' }}">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="title">@lang('quickadmin.employees.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                    
                        <ul class="treeview-menu">
                            @can('list_employee_access')
                            <li class="{{ $request->segment(2) == 'employees' ? 'active active-sub' : '' }}">
                                <a href="{{ route('employee') }}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                        @lang('quickadmin.listemployees.title')
                                    </span>
                                </a>
                            </li>
                            @endcan

                            @can('add_employee_access')
                            <li class="{{ $request->segment(2) == 'addemployee' ? 'active active-sub' : '' }}">
                                <a href="{{ route('addemployee') }}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                        @lang('quickadmin.addemployees.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                
               
                    @can('tasks_access')
                    <li class="{{ $request->segment(2) == 'tasks' | $request->segment(2) == 'addtask'
                    ? 'active active-sub' : '' }}">
                        <a href="#">
                            <i class="fa fa-file"></i>
                            <span class="title">@lang('quickadmin.tasks.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            @can('list_tasks_access')
                            <li class="{{ $request->segment(2) == 'tasks' ? 'active' : '' }}">
                                <a href="{{ route('task') }}">
                                    <i class="fa fa-file"></i>
                                    <span class="title">
                                        @lang('quickadmin.listtasks.title')
                                    </span>
                                </a>
                            </li>
                            @endcan

                            @can('add_tasks_access')
                            <li class="{{ $request->segment(2) == 'addtask' ? 'active' : '' }}">
                                <a href="{{ route('addtask') }}">
                                    <i class="fa fa-file"></i>
                                    <span class="title">
                                        @lang('quickadmin.addtasks.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                
                    @can('own_tasks_access')
                    <li class="{{ $request->segment(2) == 'mytasks' ? 'active active-sub' : '' }}">
                        <a href="#">
                            <i class="fa fa-file"></i>
                            <span class="title">@lang('quickadmin.owntasks.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                    
                            @can('my_tasks_access')
                            <li class="{{ $request->segment(2) == 'mytasks' ? 'active active-sub' : '' }}">
                                <a href="{{ route('mytask') }}">
                                    <i class="fa fa-file"></i>
                                    <span class="title">
                                        @lang('quickadmin.mytasks.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan--}}
            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>


                <a href="{{url('/logout')}}" >
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

