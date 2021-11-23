
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
        <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
        </div> -->
        <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
            Presensi
        </a>
        
    </div>
    <div class="sidebar-wrapper">
        @if ( Auth::user()->nis == null )
            @include('layouts.components.admin.adminSidebar')
        @else
            @include('layouts.components.student.studentSidebar')
        @endif
    </div>    
</div>