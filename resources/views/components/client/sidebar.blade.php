<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
</div><div class="sidebar-menu">
    <div class="main-menu">
        <div class="menu-inner">
            <div class="sidebar-header">
                <div class="logo">
                    {{-- <a href=""><img src="{{ asset('backend/images/icon/logo.png') }}" class="img-logo" alt="logo"></a> --}}
                </div>
                <div class="logo">
                    <img src="{{ Storage::url($user->profile->photo) }}" class="img-profile img-rounded"
                        alt="logo">
                </div>
                <div class="profile">
                    <div class="profile-name text-center">{{$user->name}}</div>
                    {{-- <div class="profile-title text-center">Administrator</div> --}}
                    <div class="profile-line"></div>
                </div>
            </div>
            <nav>
                <ul class="metismenu" id="menu">
                    
                    <li><a href="{{ route('client.home')}}"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{ route('client.mobile_recharge')}}"><i class="ti-mobile"></i> <span>Mobile Recharge</span></a></li>
                    <li><a href="{{ route('client.sms')}}"><i class="ti-envelope"></i> <span>Send SMS</span></a></li>
                    <li><a href="{{ route('client.profile')}}"><i class="ti-user"></i> <span>Profile</span></a></li>
                    <li><a href="{{ route('client.setting')}}"><i class="ti-settings"></i> <span>Settings</span></a></li>
                  
                  
                </ul>
            </nav>
        </div>
    </div>
</div>
