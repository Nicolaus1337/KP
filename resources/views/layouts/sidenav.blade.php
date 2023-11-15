<nav class="main-sidebar ps-menu">
            <!-- <div class="sidebar-toggle action-toggle">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div> -->
            <!-- <div class="sidebar-opener action-toggle">
                <a href="#">
                    <i class="ti-angle-right"></i>
                </a>
            </div> -->
            <div class="sidebar-header">
                <div class="text">testing</div>
                <div class="close-sidebar action-toggle">
                    <i class="ti-close"></i>
                </div>
            </div>
            <div class="sidebar-content">
                <ul>
                    <li class="{{ request()->segment(1) == '' ? 'active open' : '' }}">
                        <a href="{{ route('dashboard') }}" class="link">
                            <i class="ti-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    
                   
                   
                    
                    <!-- <li>
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-desktop"></i>
                            <span>UI Elements</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="element-ui.html" class="link"><span>Elements</span></a></li>
                            <li><a href="element-accordion.html" class="link"><span>Accordion</span></a></li>
                            <li><a href="element-tabs-collapse.html" class="link"><span>Tabs & Collapse</span></a></li>
                            <li><a href="element-card.html" class="link"><span>Card</span></a></li>
                            <li><a href="element-button.html" class="link"><span>Buttons</span></a></li>
                            <li><a href="element-alert.html" class="link"><span>Alert</span></a></li>
                            <li><a href="element-themify-icons.html" class="link"><span>Themify Icons</span></a></li>
                            <li><a href="element-modal.html" class="link"><span>Modal</span></a></li>
                        </ul>
                    </li> -->
                    @can('read data unit kerja')
                    <li class="{{request()->segment(1)== 'unit_kerja' ? 'active open' : ''}}">
                        <a href="{{ route('unit_kerja.index') }}" class="link">
                                <i class="ti-book"></i>
                                <span>Unit Kerja</span>
                            </a>
                    </li>
                    @endcan

                    

                    @can('read data user')
                    <li class="{{request()->segment(1)== 'data_user' ? 'active open' : ''}}">
                        <a href="{{ route('data_user.index') }}" class="link">
                                <i class="ti-book"></i>
                                <span>Data User</span> 
                            </a>
                    </li>
                    @endcan

                    @can('read role')
                    <li class="{{request()->segment(1)== 'roles' ? 'active open' : ''}}">
                        <a href="{{ route('roles.index') }}" class="link">
                                <i class="ti-book"></i>
                                <span>Role Manager</span> 
                            </a>
                    </li>
                    @endcan

                    
                    @can('read permission')
                    <li class="{{request()->segment(1)== 'permission' ? 'active open' : ''}}">
                        <a href="{{ route('permission.index') }}" class="link">
                                <i class="ti-book"></i>
                                <span>Permission Manager</span> 
                            </a>
                    </li>
                    @endcan

                    @can('read content')
                    <li class="{{request()->segment(1)== 'content' ? 'active open' : ''}}">
                        <a href="{{ route('content.index') }}" class="link">
                                <i class="ti-book"></i>
                                <span>Content Manager</span> 
                            </a>
                    </li>
                    @endcan

                    @can('read guide')
                    <li class="{{request()->segment(1)== 'guide' ? 'active open' : ''}}">
                        <a href="{{ route('guide.index') }}" class="link">
                                <i class="ti-book"></i>
                                <span>Guide Manager</span> 
                            </a>
                    </li>
                    @endcan

                    @can('read onboarding')
                    <li class="{{request()->segment(1)== 'onboarding' ? 'active open' : ''}}">
                        <a href="{{ route('onboarding.index') }}" class="link">
                                <i class="ti-book"></i>
                                <span>Onboarding</span> 
                            </a>
                    </li>
                    @endcan
                
                    
                    

                    
                    



                   

                    

                    

                    

                    <!-- <li>
                        <a href="#" class="link">
                                <i class="ti-book"></i>
                                <span>Permission Manager</span>
                            </a>
                    </li> -->
                    <!-- <li>
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-book"></i>
                            <span>Form</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="form-element.html" class="link">
                                    <span>Form Element</span></a>
                            </li>
                            <li><a href="form-datepicker.html" class="link">
                                    <span>Datepicker</span></a>
                            </li>
                            <li><a href="form-select2.html" class="link">
                                    <span>Select2</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-category">
                        <span class="text-uppercase">Utilities</span>
                    </li>
                    <li>
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-notepad"></i>
                            <span>Utilities</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="error-404.html" target="_blank" class="link"><span>Error 404</span></a></li>
                            <li><a href="error-403.html" target="_blank" class="link"><span>Error 403</span></a></li>
                            <li><a href="error-500.html" target="_blank" class="link"><span>Error 500</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-layers-alt"></i>
                            <span>Pages</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="pages-blank.html" class="link"><span>Blank</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-hummer"></i>
                            <span>Auth</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="auth-login.html" target="_blank" class="link"><span>Login</span></a></li>
                            <li><a href="auth-register.html" target="_blank" class="link"><span>Register</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="main-menu has-dropdown">
                            <i class="ti-write"></i>
                            <span>Tables</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="table-basic.html" class="link"><span>Table Basic</span></a></li>
                            <li><a href="table-datatables.html" class="link"><span>DataTables</span></a></li>
                        </ul>
                    </li>
                    <li class="menu-category">
                        <span class="text-uppercase">Extra</span>
                    </li>
                    <li>
                        <a href="charts.html" class="link">
                            <i class="ti-bar-chart"></i>
                            <span>Charts</span>
                        </a>
                    </li>
                    <li>
                        <a href="fullcalendar.html" class="link">
                            <i class="ti-calendar"></i>
                            <span>Calendar</span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </nav>  