<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="">
            <img width="130px" src="{{ asset('assets/images/logo/1.jpg') }}" alt="logo" />
        </a>
    </div>
    <nav class="sidebar-nav">

        <ul>
            <li class="nav-item nav-item-has-children">
                <a href="{{ route('home') }}">
                    <span>
                        <svg width="22" height="22" viewBox="0 0 22 22">
                            <path
                                d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                        </svg>
                    </span>
                    <span class="text">Trang chủ</span>
                </a>
            </li>

            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2"
                    aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.83325 19.25V17.4167H18.3333V19.25H1.83325ZM18.3333 7.33333V4.58333H16.4999V7.33333H18.3333ZM18.3333 2.75C18.8195 2.75 19.2858 2.94315 19.6296 3.28697C19.9734 3.63079 20.1666 4.0971 20.1666 4.58333V7.33333C20.1666 7.81956 19.9734 8.28588 19.6296 8.6297C19.2858 8.97351 18.8195 9.16667 18.3333 9.16667H16.4999V11.9167C16.4999 12.8891 16.1136 13.8218 15.426 14.5094C14.7383 15.197 13.8057 15.5833 12.8333 15.5833H7.33325C6.36079 15.5833 5.42816 15.197 4.74053 14.5094C4.05289 13.8218 3.66659 12.8891 3.66659 11.9167V2.75H18.3333ZM14.6666 4.58333H5.49992V11.9167C5.49992 12.4029 5.69307 12.8692 6.03689 13.213C6.38071 13.5568 6.84702 13.75 7.33325 13.75H12.8333C13.3195 13.75 13.7858 13.5568 14.1296 13.213C14.4734 12.8692 14.6666 12.4029 14.6666 11.9167V4.58333Z" />
                        </svg>
                    </span>
                    <span class="text">Quản lí sản phẩm</span>
                </a>
                <ul id="ddmenu_2" class="collapse dropdown-nav">
                    <li>
                        <a href=""></a>
                    </li>
                    @if (Auth::user()->hasPermission('Product_viewAny'))
                        <li>
                            <a href="{{ route('product.index') }}">
                                <span class="text">
                                    Sản phẩm <span class="pro-badge">pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermission('Product_viewtrash'))
                        <li>
                            <a href="{{ route('product.trash') }}">
                                <span class="text">
                                    Thùng rác <span class="pro-badge">Pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            </li>
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
                    aria-controls="ddmenu_3" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.58341 8.70841L6.87508 12.8334H2.29175L4.58341 8.70841ZM2.75008 3.66675H6.41675V7.33341H2.75008V3.66675ZM4.58341 18.3334C5.06964 18.3334 5.53596 18.1403 5.87978 17.7964C6.22359 17.4526 6.41675 16.9863 6.41675 16.5001C6.41675 16.0139 6.22359 15.5475 5.87978 15.2037C5.53596 14.8599 5.06964 14.6667 4.58341 14.6667C4.09718 14.6667 3.63087 14.8599 3.28705 15.2037C2.94324 15.5475 2.75008 16.0139 2.75008 16.5001C2.75008 16.9863 2.94324 17.4526 3.28705 17.7964C3.63087 18.1403 4.09718 18.3334 4.58341 18.3334ZM8.25008 4.58341V6.41675H19.2501V4.58341H8.25008ZM8.25008 17.4167H19.2501V15.5834H8.25008V17.4167ZM8.25008 11.9167H19.2501V10.0834H8.25008V11.9167Z" />
                        </svg>
                    </span>
                    <span class="text">Quản lí danh mục</span>
                </a>
                <ul id="ddmenu_3" class="collapse dropdown-nav">
                    <li>
                        <a href=""></a>
                    </li>
                    @if (Auth::user()->hasPermission('Category_viewAny'))
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <span class="text">
                                    Danh mục <span class="pro-badge">Pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermission('Category_viewtrash'))
                        <li>
                            <a href="{{ route('categories.getTrashed') }}">
                                <span class="text">
                                    Thùng rác <span class="pro-badge">Pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            </li>
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_4"
                    aria-controls="ddmenu_4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.16667 19.25H12.8333C12.8333 20.2584 12.0083 21.0834 11 21.0834C9.99167 21.0834 9.16667 20.2584 9.16667 19.25ZM19.25 17.4167V18.3334H2.75V17.4167L4.58333 15.5834V10.0834C4.58333 7.24171 6.41667 4.76671 9.16667 3.94171V3.66671C9.16667 2.65837 9.99167 1.83337 11 1.83337C12.0083 1.83337 12.8333 2.65837 12.8333 3.66671V3.94171C15.5833 4.76671 17.4167 7.24171 17.4167 10.0834V15.5834L19.25 17.4167ZM15.5833 10.0834C15.5833 7.51671 13.5667 5.50004 11 5.50004C8.43333 5.50004 6.41667 7.51671 6.41667 10.0834V16.5H15.5833V10.0834Z" />
                        </svg>
                    </span>
                    <span class="text"> Quản lí đơn hàng </span>
                </a>
                <ul id="ddmenu_4" class="collapse dropdown-nav">
                    <li>
                        <a href=""></a>
                    </li>
                    @if (Auth::user()->hasPermission('Order_viewAny'))
                        <li>
                            <a href="{{ route('order.index') }}">
                                <span class="text">
                                    Xem đơn hàng<span class="pro-badge">Pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_5"
                    aria-controls="ddmenu_5" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.0001 3.66675C11.9725 3.66675 12.9052 4.05306 13.5928 4.74069C14.2804 5.42832 14.6667 6.36095 14.6667 7.33341C14.6667 8.30587 14.2804 9.23851 13.5928 9.92614C12.9052 10.6138 11.9725 11.0001 11.0001 11.0001C10.0276 11.0001 9.09499 10.6138 8.40736 9.92614C7.71972 9.23851 7.33341 8.30587 7.33341 7.33341C7.33341 6.36095 7.71972 5.42832 8.40736 4.74069C9.09499 4.05306 10.0276 3.66675 11.0001 3.66675ZM11.0001 5.50008C10.5139 5.50008 10.0475 5.69324 9.70372 6.03705C9.3599 6.38087 9.16675 6.84718 9.16675 7.33341C9.16675 7.81964 9.3599 8.28596 9.70372 8.62978C10.0475 8.97359 10.5139 9.16675 11.0001 9.16675C11.4863 9.16675 11.9526 8.97359 12.2964 8.62978C12.6403 8.28596 12.8334 7.81964 12.8334 7.33341C12.8334 6.84718 12.6403 6.38087 12.2964 6.03705C11.9526 5.69324 11.4863 5.50008 11.0001 5.50008ZM11.0001 11.9167C13.4476 11.9167 18.3334 13.1359 18.3334 15.5834V18.3334H3.66675V15.5834C3.66675 13.1359 8.55258 11.9167 11.0001 11.9167ZM11.0001 13.6584C8.27758 13.6584 5.40841 14.9967 5.40841 15.5834V16.5917H16.5917V15.5834C16.5917 14.9967 13.7226 13.6584 11.0001 13.6584Z" />
                        </svg>
                    </span>
                    <span class="text">Quản lí nhân viên</span>
                </a>
                <ul id="ddmenu_5" class="collapse dropdown-nav">
                    <li>
                        <a href=""></a>
                    </li>
                    @if (Auth::user()->hasPermission('User_viewAny'))
                        <li>
                            <a href="{{ route('user.index') }}">
                                <span class="text">
                                    Danh sách nhân viên <span class="pro-badge">Pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermission('User_viewtrash'))
                        <li>
                            <a href="{{ route('user.trash') }}">
                                <span class="text">
                                    Thùng rác<span class="pro-badge">Pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            @if (Auth::user()->hasPermission('Customer_viewAny'))
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.25 9.16675H6.41667V11.0001H8.25V9.16675ZM11.9167 9.16675H10.0833V11.0001H11.9167V9.16675ZM15.5833 9.16675H13.75V11.0001H15.5833V9.16675ZM17.4167 2.75008H16.5V0.916748H14.6667V2.75008H7.33333V0.916748H5.5V2.75008H4.58333C3.56583 2.75008 2.75 3.57508 2.75 4.58341V17.4167C2.75 17.903 2.94315 18.3693 3.28697 18.7131C3.63079 19.0569 4.0971 19.2501 4.58333 19.2501H17.4167C17.9029 19.2501 18.3692 19.0569 18.713 18.7131C19.0568 18.3693 19.25 17.903 19.25 17.4167V4.58341C19.25 4.09718 19.0568 3.63087 18.713 3.28705C18.3692 2.94324 17.9029 2.75008 17.4167 2.75008ZM17.4167 17.4167H4.58333V7.33342H17.4167V17.4167Z" />
                            </svg>
                        </span>
                        <class="text">
                            Khách hàng <span class="pro-badge">Pro</span>
                            </span>
                    </a>
                </li>
            @endif
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_6"
                    aria-controls="ddmenu_6" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.9067 14.2908L15.2808 11.9167H6.41667V10.0833H15.2808L12.9067 7.70917L14.2083 6.41667L18.7917 11L14.2083 15.5833L12.9067 14.2908ZM17.4167 2.75C17.9029 2.75 18.3692 2.94315 18.713 3.28697C19.0568 3.63079 19.25 4.0971 19.25 4.58333V8.86417L17.4167 7.03083V4.58333H4.58333V17.4167H17.4167V14.9692L19.25 13.1358V17.4167C19.25 17.9029 19.0568 18.3692 18.713 18.713C18.3692 19.0568 17.9029 19.25 17.4167 19.25H4.58333C3.56583 19.25 2.75 18.425 2.75 17.4167V4.58333C2.75 3.56583 3.56583 2.75 4.58333 2.75H17.4167Z" />
                        </svg>
                    </span>
                    <span class="text"> Nhóm quyền</span>
                </a>
                <ul id="ddmenu_6" class="collapse dropdown-nav">
                    <li>
                        <a href=""></a>
                    </li>
                    @if (Auth::user()->hasPermission('Group_viewAny'))
                        <li>
                            <a href="{{ route('group.index') }}">
                                <span class="text">
                                    Danh sách nhóm quyền <span class="pro-badge">Pro</span>
                                </span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->hasPermission('Group_create'))
                        <li>
                            <a href="{{ route('group.create') }}">
                                <span class="text">
                                    Tạo nhóm quyền<span class="pro-badge">Pro</span>
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
