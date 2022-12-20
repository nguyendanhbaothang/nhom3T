<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="index.html">
        <img width="130px" src="{{asset('assets/images/logo/1.jpg')}}" alt="logo" />
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>

        <li class="nav-item nav-item-has-children">
            <a href="{{ route('home') }}">


            <span>
              <svg width="22" height="22" viewBox="0 0 22 22">
                <path
                  d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z"
                />
              </svg>
            </span>
            <span class="text">Dashboard</span>

          </a>
        </li>

        <li class="nav-item nav-item-has-children">
           <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
              <span class="icon">
                 <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                       d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                       />
                 </svg>
              </span>
              <span class="text"> Manager Product</span>
           </a>
           <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                 <a href=""></a>
              </li>
              @if(Auth::user()->hasPermission('Product_viewAny'))
              <li>
                 <a href="{{ route('product.index') }}">
                 <span class="text">
                 Product <span class="pro-badge">Pro</span>
                 </span>
                 </a>
              </li>
              @endif
              @if(Auth::user()->hasPermission('Product_viewtrash'))
              <li>
                 <a href="{{ route('product.trash') }}">
                 <span class="text">
                 Garbage can <span class="pro-badge">Pro</span>
                 </span>
                 </a>
              </li>
              @endif
           </ul>
        </li>
        </li>
        <li class="nav-item nav-item-has-children">
           <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
              <span class="icon">
                 <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                       d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                       />
                 </svg>
              </span>
              <span class="text">Manager Category</span>
           </a>
           <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                 <a href=""></a>
              </li>
              @if(Auth::user()->hasPermission('Category_viewAny'))
              <li>
                 <a href="{{ route('categories.index') }}">
                 <span class="text">
                 Category <span class="pro-badge">Pro</span>
                 </span>
                 </a>
              </li>
              @endif
              @if(Auth::user()->hasPermission('Category_viewtrash'))
              <li>
                 <a href="{{ route('categories.getTrashed') }}">
                 <span class="text">
                 Garbage <span class="pro-badge">Pro</span>
                 </span>
                 </a>
              </li>
              @endif
           </ul>
        </li>
        </li>





        <li class="nav-item nav-item-has-children">
           <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
              <span class="icon">
                 <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                       d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                       />
                 </svg>
              </span>
              <span class="text"> Manager Order </span>
           </a>
           <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                 <a href=""></a>
              </li>
              @if(Auth::user()->hasPermission('Order_viewAny'))
              <li>
                 <a href="{{ route('order.index') }}">
                 <span class="text">
                 View Order<span class="pro-badge">Pro</span>
                 </span>
                 </a>
              </li>
              @endif
           </ul>
        </li>


        <li class="nav-item nav-item-has-children">
         <a
            href="#0"
            class="collapsed"
            data-bs-toggle="collapse"
            data-bs-target="#ddmenu_2"
            aria-controls="ddmenu_2"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="icon">
               <svg
                  width="22"
                  height="22"
                  viewBox="0 0 22 22"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  >
                  <path
                     d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                     />
               </svg>
            </span>
            <span class="text">Manager User</span>
         </a>
         <ul id="ddmenu_2" class="collapse dropdown-nav">
            <li>
               <a href=""></a>
            </li>
            @if(Auth::user()->hasPermission('User_viewAny'))
            <li>
               <a href="{{ route('user.index') }}">
               <span class="text">
               List User <span class="pro-badge">Pro</span>
               </span>
               </a>
            </li>
            @endif
            {{-- @if(Auth::user()->hasPermission('User_viewtrash')) --}}
            <li>
               <a href="{{ route('user.trash') }}">
               <span class="text">
                  Garbage<span class="pro-badge">Pro</span>
               </span>
               </a>
            </li>
            {{-- @endif --}}
         </ul>
      </li>




        @if(Auth::user()->hasPermission('Customer_viewAny'))
        <li class="nav-item">
           <a href="{{ route('customers.index') }}">
              <span class="icon">
                 <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                       d="M8.25 9.16675H6.41667V11.0001H8.25V9.16675ZM11.9167 9.16675H10.0833V11.0001H11.9167V9.16675ZM15.5833 9.16675H13.75V11.0001H15.5833V9.16675ZM17.4167 2.75008H16.5V0.916748H14.6667V2.75008H7.33333V0.916748H5.5V2.75008H4.58333C3.56583 2.75008 2.75 3.57508 2.75 4.58341V17.4167C2.75 17.903 2.94315 18.3693 3.28697 18.7131C3.63079 19.0569 4.0971 19.2501 4.58333 19.2501H17.4167C17.9029 19.2501 18.3692 19.0569 18.713 18.7131C19.0568 18.3693 19.25 17.903 19.25 17.4167V4.58341C19.25 4.09718 19.0568 3.63087 18.713 3.28705C18.3692 2.94324 17.9029 2.75008 17.4167 2.75008ZM17.4167 17.4167H4.58333V7.33342H17.4167V17.4167Z"
                       />
                 </svg>
              </span>
              <class="text">
              Customer <span class="pro-badge">Pro</span>
              </span>
           </a>
        </li>
        @endif



        <li class="nav-item nav-item-has-children">
         <a
            href="#0"
            class="collapsed"
            data-bs-toggle="collapse"
            data-bs-target="#ddmenu_2"
            aria-controls="ddmenu_2"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="icon">
               <svg
                  width="22"
                  height="22"
                  viewBox="0 0 22 22"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  >
                  <path
                     d="M12.8334 1.83325H5.50008C5.01385 1.83325 4.54754 2.02641 4.20372 2.37022C3.8599 2.71404 3.66675 3.18036 3.66675 3.66659V18.3333C3.66675 18.8195 3.8599 19.2858 4.20372 19.6296C4.54754 19.9734 5.01385 20.1666 5.50008 20.1666H16.5001C16.9863 20.1666 17.4526 19.9734 17.7964 19.6296C18.1403 19.2858 18.3334 18.8195 18.3334 18.3333V7.33325L12.8334 1.83325ZM16.5001 18.3333H5.50008V3.66659H11.9167V8.24992H16.5001V18.3333Z"
                     />
               </svg>
            </span>
            <span class="text"> Manager Group</span>
         </a>
         <ul id="ddmenu_2" class="collapse dropdown-nav">
            <li>
               <a href=""></a>
            </li>
            @if(Auth::user()->hasPermission('Group_viewAny'))
            <li>
               <a href="{{ route('group.index') }}">
               <span class="text">
               List Group <span class="pro-badge">Pro</span>
               </span>
               </a>
            </li>
            @endif
            @if(Auth::user()->hasPermission('Group_create'))
            <li>
               <a href="{{ route('group.create') }}">
               <span class="text">
                  Create Position<span class="pro-badge">Pro</span>
               </span>
               </a>
            </li>
            @endif
         </ul>
      </li>


    </a>
  </li>

     </ul>
  </nav>
</aside>
