  <div class="vertical-menu">
      @php
          $id = Auth::user()->id;
          $adminData = App\Models\User::find($id);

      @endphp


      <div data-simplebar class="h-100">

          <!-- User details -->
          <div class="user-profile text-center mt-3">
              <div class="">
                  <img src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                      alt="" class="avatar-md rounded-circle">
              </div>
              <div class="mt-3">
                  <h4 class="font-size-16 mb-1">{{ $adminData->name }}</h4>
                  <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                      Online</span>
              </div>
          </div>

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title">Menu</li>

                  <li>
                      <a href="index.html" class="waves-effect">
                          <i class="ri-dashboard-line"></i><span
                              class="badge rounded-pill bg-success float-end">3</span>
                          <span>Dashboard</span>
                      </a>
                  </li>



                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-mail-send-line"></i>
                          <span>Home slide setup</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('home.slide') }}">Home Slide</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-mail-send-line"></i>
                          <span>Portifolio Page Setup</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('all.portifolio') }}">All Portifolio </a></li>
                          <li><a href="{{ route('add.portifolio') }}">Add Portifolio </a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-mail-send-line"></i>
                          <span>About Page Setup</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="{{ route('about.page') }}">About Page</a></li>
                          <li><a href="{{ route('about.mult.image') }}">About Mult Images</a></li>
                          <li><a href="{{ route('all.mult.image') }}">All Mult Images</a></li>
                      </ul>
                  </li>



                  <li class="menu-title">Pages</li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-account-circle-line"></i>
                          <span>Authentication</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="auth-login.html">Login</a></li>
                          <li><a href="auth-register.html">Register</a></li>
                          <li><a href="auth-recoverpw.html">Recover Password</a></li>
                          <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="ri-profile-line"></i>
                          <span>Utility</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="pages-starter.html">Starter Page</a></li>
                          <li><a href="pages-timeline.html">Timeline</a></li>
                          <li><a href="pages-directory.html">Directory</a></li>
                          <li><a href="pages-invoice.html">Invoice</a></li>
                          <li><a href="pages-404.html">Error 404</a></li>
                          <li><a href="pages-500.html">Error 500</a></li>
                      </ul>
                  </li>





              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>
