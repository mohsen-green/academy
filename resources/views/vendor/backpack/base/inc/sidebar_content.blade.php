<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}\"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-pager'></i> <span>{{ trans('backpack::base.pages') }}</span></a></li>
<!-- Users, Roles, Permissions -->
{{-- <li class="nav-item nav-dropdown"> --}}
	{{-- <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a> --}}

	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>{{ trans('backpack::base.users') }}</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>{{ trans('backpack::base.roles') }}</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>{{ trans('backpack::base.permissions') }}</span></a></li>



{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('username') }}'><i class='nav-icon la la-question'></i> Usernames</a></li> --}}

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('courses') }}'><i class='nav-icon la la-question'></i>{{ trans('backpack::base.Courses') }} </a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('course_user') }}'><i class='nav-icon la la-question'></i>{{ trans('backpack::base.Courses_User') }} </a></li>
