




<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>




                     <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                         {{ trans('main_trans.All Step study') }}</li>

                     <!-- start Dashboard-->

                     <li class="{{ request()->segment(2) == 'dashboard' ? 'badge-success' : '' }}">
                        <a href="{{ url('/dashboard') }}">
                       <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">

                         {{trans('main_trans.home')}}</span>

                                     </div>
                             <div class="clearfix"></div>
                          </a>
                      </li>
                    <!-- end Dashboard-->

                    <!-- start Grades-->
                    <li class="{{ request()->segment(2) == 'grades' ? 'badge-success' : '' }}">

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Grades') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li class="{{ request()->segment(2) == 'grades' ? 'badge-success' : '' }}">

                                <a href="{{ Route('grades.index') }}">{{ trans('main_trans.Grades_List') }}</a></li>

                        </ul>

                    </li>
                    <!-- end Grades-->

                    <!-- start class_rooms-->
                    <li class="{{ request()->segment(2) == 'class_room' ? 'badge-success' : '' }}">

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{ trans('class_room.List_classes') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li class="{{ request()->segment(2) == 'class_room' ? 'badge-danger' : '' }}">
                                <a href="{{ Route('class_room.index') }}">{{ trans('class_room.title_page') }}</a></li>
                        </ul>
                    </li>
                    <!-- end class_rooms-->

                    <!-- start sections-->

                    <li class="{{ request()->segment(2) == 'sections' ? 'badge-success' : '' }}">

                        <a href="{{ route('sections.index') }}"><i class="fas fa-chalkboard"></i><span
                            class="right-nav-text">{{ trans('main_trans.sections') }}
                           <div class="pull-right"><i class="ti-plus"></i></div></span> </a>

                    </li>
                    <!-- end sections-->


                    <!-- start Parents-->
                    <li class="{{ request()->segment(2) == 'add_Parent' ? 'badge-success' : '' }}">

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li class="{{ request()->segment(2) == 'add_Parent' ? 'badge-success' : '' }}">

                                <a href="{{ URL('add_Parent')  }}">


                                {{trans('main_trans.List_Parents')}} </a> </li>
                        </ul>
                    </li>

                    <!-- end Parents-->



                  <!-- start teacher-->
                  <li class="{{ request()->segment(2) == 'Teachers' ? 'badge-success' : '' }}">

                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                          <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i>


                          <span class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>

                          <div class="clearfix"></div>
                      </a>
                      <ul id="font-icon" class="collapse" data-parent="#sidebarnav">

                        <li class="{{ request()->segment(2) == 'Teachers' ? 'badge-success' : '' }}">

                    <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>

                      </ul>
                  </li>
                <!-- end teacher-->

                <!-- start student-->

                <li>


                <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                      <ul id="students-menu" class="collapse">
                        <li>

                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_trans.Student_information')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                              <ul id="Student_information" class="collapse">

                                <li>


                                    <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                                  <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                              </ul>
                          </li>

                          <li>

                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                              <ul id="Students_upgrade" class="collapse">
                                  <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_prom')}}</a></li>
                                  <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_prom')}}</a> </li>
                              </ul>
                          </li>

                          <li>
                              <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                              <ul id="Graduate students" class="collapse">
                                  <li> <a href="{{route('Graduate.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                                  <li> <a href="{{route('Graduate.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                              </ul>
                          </li>
                      </ul>
                  </li>

               <!-- end student-->

                  <!-- start fees -->

                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                          <div class="pull-left"><i class="fas fa-money-bill-wave-alt">
                              </i><span class="right-nav-text">
                                 {{trans('main_trans.fees')}}
                               </span></div>
                          <div class="pull-right"><i class="ti-plus"></i></div>
                          <div class="clearfix"></div>
                      </a>
                      <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                          <li> <a href="{{ route('Fees.index') }}">{{trans('main_trans.add_fees')}}</a> </li>
                          <li> <a href="{{ route('Fees_Invoices.index') }}">{{trans('main_trans.fees')}}</a> </li>
                          <li> <a href="{{ route('receipt_students.index') }}">{{ trans('main_trans.receipt') }}</a> </li>
                          <li> <a href="{{ route('ProcessingFee.index') }}">{{ trans('main_trans.Fee_exclusion') }}</a></li>
                          <li> <a href="{{ route('Payment_students.index') }}">{{ trans('main_trans.exchange_bonds') }}</a> </li>

                      </ul>
                  </li>
                  <!-- end fees-->

                  <!-- start Attendance-->

                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                          <div class="pull-left"><i class="ti-id-badge"></i><span
                                  class="right-nav-text">{{ trans('main_trans.Attendance')}}</span></div>
                          <div class="pull-right"><i class="ti-plus"></i></div>
                          <div class="clearfix"></div>
                      </a>
                      <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                          <li> <a href="{{ route('Attendance.index') }}">
                           {{ trans('main_trans.Attendance')}}
                        </a> </li>
                      </ul>
                  </li>

                  <!-- end Attendance-->




                  <!-- start subjects-->

                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                          <div class="pull-left"><i class="ti-id-badge"></i><span
                                  class="right-nav-text">{{trans('main_trans.Subjects')}}</span></div>
                          <div class="pull-right"><i class="ti-plus"></i></div>
                          <div class="clearfix"></div>
                      </a>
                      <ul id="Subjects" class="collapse" data-parent="#sidebarnav">
                          <li> <a href="{{route('subjects.index')}}">{{trans('main_trans.Subjects')}}</a> </li>
                      </ul>
                  </li>

                  <!-- end subjects-->

                  <!-- start Quizzes-->

                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizzes">
                          <div class="pull-left"><i class="fas fa-book-open"></i><span
                                  class="right-nav-text">{{trans('main_trans.the_exams')}}</span></div>
                          <div class="pull-right"><i class="ti-plus"></i></div>
                          <div class="clearfix"></div>
                      </a>
                      <ul id="Quizzes" class="collapse" data-parent="#sidebarnav">
                          <li> <a href="{{route('Quizzes.index')}}">{{trans('main_trans.the_exams')}}</a> </li>
                          <li> <a href="{{route('questions.index')}}">{{trans('main_trans.the_exams_list')}}</a> </li>

                      </ul>
                  </li>

                  <!-- end Quizzes-->

                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                          <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">
                            {{ trans('main_trans.Online_classes') }}</span></div>
                          <div class="pull-right"><i class="ti-plus"></i></div>
                          <div class="clearfix"></div>
                      </a>
                      <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                          <li> <a href="{{ route('online_classes.index') }}">{{ trans('main_trans.Online_classes') }}</a> </li>
                      </ul>
                  </li>


                  <!-- start library-->

                  <li>
                      <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                          <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">
                              {{trans('main_trans.the_library')}}</span></div>
                          <div class="pull-right"><i class="ti-plus"></i></div>
                          <div class="clearfix"></div>
                      </a>
                      <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                          <li> <a href="{{ route('library.index') }}">{{trans('main_trans.the_library')}}</a> </li>
                      </ul>
                  </li>
                  <!-- end library-->


                  <!-- start setting-->

                  <li>

                      <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">
                          {{trans('main_trans.Settings')}} </span>
                          <div class="pull-right"><i class="ti-plus"></i></div>


                      </a>

                  </li>
                  <!-- end setting-->




                 </ul>


        <!-- end school-->


    </ul>
</div>
