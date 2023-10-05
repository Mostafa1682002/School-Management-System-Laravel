<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                @if (auth('web')->check())
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">
                        <!-- menu item Dashboard-->
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="ti-home"></i><span class="right-nav-text">{{ trans('main_trans.Home') }}</span>
                            </a>
                        </li>
                        <!-- Grades-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                                <div class="pull-left"><i class="fas fa-school"></i><span
                                        class="right-nav-text">{{ trans('main_trans.schoolGrade') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a
                                        href="{{ route('schoolGrade.index') }}">{{ trans('SchoolGrades_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- classes-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                                <div class="pull-left"><i class="fa fa-building"></i><span
                                        class="right-nav-text">{{ trans('main_trans.classes') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('classes.index') }}">{{ trans('Classes_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- sections-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                                <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                                        class="right-nav-text">{{ trans('main_trans.sections') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('sections.index') }}">{{ trans('Sections_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>



                        <!-- students-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                    class="fas fa-user-graduate"></i>{{ trans('main_trans.students') }}<div
                                    class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="students-menu" class="collapse">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse"
                                        data-target="#Student_information">{{ trans('Student_trans.students_information') }}
                                        <div class="pull-right"><i class="ti-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="Student_information" class="collapse">
                                        <li> <a
                                                href="{{ route('students.index') }}">{{ trans('Student_trans.page_title') }}</a>
                                        </li>
                                        <li> <a
                                                href="{{ route('students.create') }}">{{ trans('Student_trans.add_page_title') }}</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse"
                                        data-target="#Students_upgrade">{{ trans('Student_trans.promotion') }}
                                        <div class="pull-right"><i class="ti-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="Students_upgrade" class="collapse">
                                        <li> <a
                                                href="{{ route('promotion.index') }}">{{ trans('Student_trans.list_promotion') }}</a>
                                        </li>
                                        <li> <a
                                                href="{{ route('promotion.create') }}">{{ trans('Student_trans.add_promotion') }}</a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse"
                                        data-target="#Graduate students">{{ trans('Student_trans.graduated') }}<div
                                            class="pull-right"><i class="ti-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="Graduate students" class="collapse">
                                        <li> <a
                                                href="{{ route('graduated.index') }}">{{ trans('Student_trans.graduated_list') }}</a>
                                        </li>
                                        <li> <a
                                                href="{{ route('graduated.create') }}">{{ trans('Student_trans.graduate_student') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!-- Teachers-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                                <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                        class="right-nav-text">{{ trans('main_trans.Teachers') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('teachers.index') }}">{{ trans('Teacher_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Parents-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                                <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Parents') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('add_parent') }}">{{ trans('Myparent_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Accounts-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                                <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Accounts') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('feese.index') }}">{{ trans('Fees_trans.study_fees') }}</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('feese_invoice.index') }}">{{ trans('Fees_invoice_trans.fees_ivoice') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Attendance-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                                <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Attendance') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('attendance.index') }}">{{ trans('Attendance_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Subjects-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject-icon">
                                <div class="pull-left"><i class="fas fa-file-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Subjects') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="subject-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('subject.index') }}">{{ trans('Subject_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Exams-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                                <div class="pull-left"><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Exams') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('exam.index') }}">{{ trans('Exam_trans.page_title') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('questions.create') }}">{{ trans('Question_trans.add_page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Books-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                                <div class="pull-left"><i class="fas fa-book"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Books') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('books.index') }}">{{ trans('Books_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Onlinec lasses-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                                <div class="pull-left"><i class="fas fa-video"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Onlineclasses') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('online-classes.index') }}">{{ trans('OnlineClasses_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Settings-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                                <div class="pull-left"><i class="fas fa-cogs"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Settings') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>


                        <!-- Users-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                                <div class="pull-left"><i class="fas fa-users"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Users') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>

                    </ul>
                @elseif (auth('student')->check())
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">


                        <!-- Teachers-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                                <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                        class="right-nav-text">{{ trans('main_trans.Teachers') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('teachers.index') }}">{{ trans('Teacher_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Parents-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                                <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Parents') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('add_parent') }}">{{ trans('Myparent_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Accounts-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                                <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Accounts') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('feese.index') }}">{{ trans('Fees_trans.study_fees') }}</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('feese_invoice.index') }}">{{ trans('Fees_invoice_trans.fees_ivoice') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Attendance-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                                <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Attendance') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('attendance.index') }}">{{ trans('Attendance_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Subjects-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject-icon">
                                <div class="pull-left"><i class="fas fa-file-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Subjects') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="subject-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('subject.index') }}">{{ trans('Subject_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Exams-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                                <div class="pull-left"><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Exams') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('exam.index') }}">{{ trans('Exam_trans.page_title') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('questions.create') }}">{{ trans('Question_trans.add_page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Books-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                                <div class="pull-left"><i class="fas fa-book"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Books') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('books.index') }}">{{ trans('Books_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Onlinec lasses-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                                <div class="pull-left"><i class="fas fa-video"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Onlineclasses') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('online-classes.index') }}">{{ trans('OnlineClasses_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Settings-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                                <div class="pull-left"><i class="fas fa-cogs"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Settings') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>


                        <!-- Users-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                                <div class="pull-left"><i class="fas fa-users"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Users') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>

                    </ul>
                @elseif (auth('parent')->check())
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">


                        <!-- Teachers-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                                <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                        class="right-nav-text">{{ trans('main_trans.Teachers') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('teachers.index') }}">{{ trans('Teacher_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Parents-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                                <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Parents') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('add_parent') }}">{{ trans('Myparent_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Accounts-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                                <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Accounts') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('feese.index') }}">{{ trans('Fees_trans.study_fees') }}</a>
                                </li>
                                <li>
                                    <a
                                        href="{{ route('feese_invoice.index') }}">{{ trans('Fees_invoice_trans.fees_ivoice') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Attendance-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                                <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Attendance') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('attendance.index') }}">{{ trans('Attendance_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Subjects-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject-icon">
                                <div class="pull-left"><i class="fas fa-file-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Subjects') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="subject-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('subject.index') }}">{{ trans('Subject_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Exams-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                                <div class="pull-left"><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Exams') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('exam.index') }}">{{ trans('Exam_trans.page_title') }}</a>
                                </li>
                                <li> <a
                                        href="{{ route('questions.create') }}">{{ trans('Question_trans.add_page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Books-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                                <div class="pull-left"><i class="fas fa-book"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Books') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('books.index') }}">{{ trans('Books_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Onlinec lasses-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                                <div class="pull-left"><i class="fas fa-video"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Onlineclasses') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('online-classes.index') }}">{{ trans('OnlineClasses_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Settings-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                                <div class="pull-left"><i class="fas fa-cogs"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Settings') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>


                        <!-- Users-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                                <div class="pull-left"><i class="fas fa-users"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Users') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>

                    </ul>
                @elseif (auth('teacher')->check())
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">
                        <!-- menu item Dashboard-->
                        <li>
                            <a href="{{ route('teacher.dashboard') }}">
                                <i class="ti-home"></i><span class="right-nav-text">{{ trans('main_trans.Home') }}</span>
                            </a>
                        </li>
                        <!-- sections-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                                <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                                        class="right-nav-text">{{ trans('main_trans.sections') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('teacher.sections') }}">{{ trans('Sections_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>



                        <!-- students-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-icon">
                                <div class="pull-left"><i class="fas fa-user-graduate"></i><span
                                        class="right-nav-text">{{ trans('main_trans.students') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="students-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('teacher.students') }}">{{ trans('Student_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>



                        <!-- Attendance-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                                <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Attendance') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('attendance.index') }}">{{ trans('Attendance_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Subjects-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject-icon">
                                <div class="pull-left"><i class="fas fa-file-alt"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Subjects') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="subject-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('teacher.subjects') }}">{{ trans('Subject_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Exams-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                                <div class="pull-left"><i class="fas fa-book-open"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Exams') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('teacher.exams') }}">{{ trans('Exam_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Books-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                                <div class="pull-left"><i class="fas fa-book"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Books') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('books.index') }}">{{ trans('Books_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Onlinec lasses-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                                <div class="pull-left"><i class="fas fa-video"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Onlineclasses') }}</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a
                                        href="{{ route('online-classes.index') }}">{{ trans('OnlineClasses_trans.page_title') }}</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Settings-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                                <div class="pull-left"><i class="fas fa-cogs"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Settings') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>


                        <!-- Users-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                                <div class="pull-left"><i class="fas fa-users"></i><span
                                        class="right-nav-text">{{ trans('main_trans.Users') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                <li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li>
                            </ul>
                        </li>

                    </ul>
                @endif
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
