        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>ប្រព័ន្ធគ្រប់គ្រប់វត្តហប់</span>
                        </li>
                        <li id="menu_setting_dashboard">
                            <a href="{{ url('/dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('user.profile') }}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                        </li> --}}
                        <li id="menu_setting_monk">
                            <a href="#"><i class="fe fe-user"></i> <span> គ្រប់គ្រងស្នាក់នៅ</span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="sidebar-menu" id="setting_collapse_monk">
                                <li id="menu_manage_monk"><a href="{{ route('all.monk') }}"> ព្រះសង្ឃ </a></li>
                                <li id="menu_manage_stayer"><a href="{{ route('all.stayer') }}">អ្នកស្នាក់នៅវត្ត</a>
                                </li>
                                <li id="menu_manage_student"><a href="{{ route('all.student') }}"> កូនសិស្ស </a></li>
                            </ul>
                        </li>
                        <li id="menu_setting_all_managers">
                            <a href="{{ route('all.comission') }}"><i class="fe fe-users"></i>
                                <span>គណៈកម្មការ</span></a>
                        </li>
                        <li id="menu_setting_all_invite">
                            <a href="{{ route('all.invite') }}"><i class="fe fe-bookmark"></i> <span>ការនិមន្តបុណ្យ</span></a>
                        </li>
                        <li id="menu_setting_money">
                            <a href="#"><i class="fe fe-book"></i> <span>កត់ត្រាបច្ច័យ</span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="sidebar-menu" id="setting_collapse_money">
                                <li id="menu_manage_money">
                                    <a href="{{ route('all.income') }}"><span>ចំណូល</span></a>
                                </li>
                                <li id="menu_manage_money">
                                    <a href="{{ route('all.expense') }}"> <span>ចំណាយ</span></a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu_setting_settings">
                            <a href="#"><i class="fe fe-map"></i> <span> ការកំណត់</span> <span
                                    class="menu-arrow"></span></a>
                            <ul class="sidebar-menu" id="setting_collapse_settings">
                                <li id="menu_manage_settings">
                                    <a href="{{ route('all.village') }}"><span>បញ្ជីភូមិ</span></a>
                                </li>
                                <li id="menu_manage_settings">
                                    <a href=""> <span>ការកំណត់ចំនួន</span></a>
                                </li>
                            </ul>
                        </li>

                        <li id="menu_setting_all_user">
                            <a href="{{ route('all.user') }}"><i class="fe fe-user-plus"></i>
                                <span>អ្នកប្រើប្រាស់</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->
