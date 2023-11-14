<header class="header-navbar fixed">
            <div class="header-wrapper">
                <div class="header-left">
                    <div class="sidebar-toggle action-toggle"><i class="fas fa-bars"></i></div>
                    
                </div>
                <div class="header-content">
                <div class="theme-switch-icon"></div>
                <form method="POST" action="{{ route('logout') }}">
                @csrf

                <div class="btnlogout">
                <button type="submit" class="btn mb-2 btn-danger"><i class="ti-power-off"></i> Logout</button>
                </div>             
                </form>

                </div>
            </div>
        </header>