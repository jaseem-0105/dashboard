 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

     </a>
     <hr class="sidebar-divider my-0">
     <li class="nav-item ">
         <a class="nav-link" href="{{ route('admin.viewProfile') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Profile</span></a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item ">
         <a class="nav-link" href="{{ route('admin.viewHome') }}">
             <i class="bi bi-house"></i>
             <span>Home</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('admin.viewAbout') }}">
             <i class="bi bi-person"></i>
             <span>About me</span>
         </a>
         <hr class="sidebar-divider my-0">
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('admin.viewEducation') }}">
             <i class="bi bi-book"></i>
             <span>Education</span>
         </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider  my-0">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('admin.viewPortfolio') }}">
             <i class="fas fa-fw fa-folder"></i>
             <span>Portfolio</span>
         </a>
     </li>
     <div style="position: fixed; bottom: 0; left: 75px">
         <a type="button" class="btn btn-success" href="{{ route('admin.home') }}">
             <i class="bi bi-binoculars-fill"></i></a>
     </div>


 </ul>
 <!-- End of Sidebar -->
