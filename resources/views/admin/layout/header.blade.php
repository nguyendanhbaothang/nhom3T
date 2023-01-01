<header class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-6">
          <div class="header-left d-flex align-items-center">
            <div class="menu-toggle-btn mr-20">
              <button
                id="menu-toggle"
                class="main-btn primary-btn btn-hover"
              >
              Menu
              </button>
            </div>
            <div class="header-search d-none d-md-flex">
              <form  action="{{route('categories.search')}}" method="GET">
                @csrf
               <input type="text" name="search" placeholder="Tìm kiếm..." />
                <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-zoom-in" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                  <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                  <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                </svg></button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-7 col-6">
           <div class="header-right">
              <!-- notification start -->
              <!-- notification end -->
              <!-- message start -->
              <!-- message end -->
              <!-- filter start -->
              <!-- filter end -->
              <!-- profile start -->
              <div class="profile-box ml-15">
                <button
                  class="dropdown-toggle bg-transparent border-0"
                  type="button"
                  id="profile"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <div class="profile-info">
                    <div class="info">
                      <h6>{{ auth()->user()->name }}</h6>
                      <div class="image">
                        <img src="{{asset('assets/images/user/'. auth()->user()->image)}}" class="user-img" alt="">
                        <span class="status"></span>
                      </div>
                    </div>
                  </div>
                  <i class="lni lni-chevron-down"></i>
                </button>
                <ul
                  class="dropdown-menu dropdown-menu-end"
                  aria-labelledby="profile"
                >
                <li>
                    <a href="{{ route('user.show', Auth::User()->id) }}">
                      Thông tin cá nhân
                    </a>
                  </li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <a  href="{{ route('logout') }}"onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="fa fa-key"></i> Đăng xuất</a>
                    </form>
                  </li>
                </ul>
              </div>
              <!-- profile end -->
           </div>
        </div>
     </div>
  </div>
</header>
