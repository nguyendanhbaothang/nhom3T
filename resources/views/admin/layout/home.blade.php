<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link>

    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.css" />
    <link rel="stylesheet" href="assets/css/quill/bubble.css" />
    <link rel="stylesheet" href="assets/css/quill/snow.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/morris.css" />
    <link rel="stylesheet" href="assets/css/datatable.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
    <!-- ======== sidebar-nav start =========== -->
    @include('admin.layout.sidebar')
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('admin.layout.header')
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Trang chủ</h2>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30" >
                        <div class="icon primary">
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Sản phẩm</h6>

                            <h3 class="text-bold mb-10">
                                <h1>{{ $totalProduct }}</h1>
                            </h3>
                            <a href="{{ route('product.index') }}" class="mb-10">Xem</a>
                            <p class="text-sm text-danger">
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30" >
                        <div class="icon primary">
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Danh mục</h6>

                            <h3 class="text-bold mb-10">
                                <h1>{{ $totalCategory }}</h1>
                            </h3>
                            <a href="{{ route('categories.index') }}" class="mb-10">Xem</a>
                            <p class="text-sm text-danger">
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30" >
                        <div class="icon primary">
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Đơn hàng</h6>

                            <h3 class="text-bold mb-10">
                                <h1>{{ $totalOrder }}</h1>
                            </h3>
                            <a href="{{ route('order.index') }}" class="mb-10">Xem</a>
                            <p class="text-sm text-danger">
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30" style="background-color: rgb(140, 248, 136)">
                        <div class="icon primary">
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Nhân viên</h6>

                            <h3 class="text-bold mb-10">
                                <h1>{{ $totalUser }}</h1>
                            </h3>
                            <a href="{{ route('user.index') }}" class="mb-10">Xem</a>
                            <p class="text-sm text-danger">
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div> --}}
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30" >
                        <div class="icon primary">
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Khách hàng</h6>

                            <h3 class="text-bold mb-10">
                                <h1>{{ $totalCustomer }}</h1>
                            </h3>
                            <a href="{{ route('customers.index') }}" class="mb-10">Xem</a>
                            <p class="text-sm text-danger">
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                {{-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30" style="background-color: rgb(241, 153, 94)">
                        <div class="icon primary">
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Nhóm quyền</h6>

                            <h3 class="text-bold mb-10">
                                <h1>{{ $totalGroup }}</h1>
                            </h3>
                            <a href="{{ route('group.index') }}" class="mb-10">Xem</a>
                            <p class="text-sm text-danger">
                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div> --}}
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <!-- End Row -->

            <!-- End Row -->

            <!-- End Row -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap align-items-center justify-content-between">
                            <div class="left">
                                <h6  class="text-medium mb-30" style="color: rgb(130, 41, 214)">Sản phẩm mới nhất</h6>
                            </div>
                            <div class="right">

                                <!-- end select -->
                            </div>
                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6 class="text-sm text-medium">Sản phẩm</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Danh mục
                                            </h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Giá
                                            </h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($productnew as $product)
                                        <tr>
                                            <td>
                                                <div class="product">
                                                    <div class="image">
                                                        <img src="{{ asset('public/assets/product/' . $product->image) }}"
                                                            alt="" />
                                                    </div>
                                                    <p class="text-sm">{{ $product->name }}</p>
                                                </div>


                                            </td>
                                            <td>
                                                {{ $product->category->name }}
                                            </td>
                                            <td>
                                                {{ number_format($product->price) }} <h5 style="color: rgb(130, 41, 214)">VND</h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap align-items-center justify-content-between">
                            <div class="left">
                                <h6 class="text-medium mb-30" style="color: rgb(130, 41, 214)">Khách hàng</h6>
                            </div>
                            <div class="right">

                                <!-- end select -->
                            </div>
                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6 class="text-sm text-medium">Tên</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Địa chỉ
                                            </h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Sđt
                                            </h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($topcustomer as $customer)
                                        <tr>
                                            <td>
                                                {{ $customer->name }}</p>
                                            </td>
                                            <td>
                                                {{ $customer->address }}
                                            </td>
                                            <td>
                                                {{ $customer->phone }}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap align-items-center justify-content-between">
                            <div class="left">
                                <h6 class="text-medium mb-30" style="color: rgb(130, 41, 214)">Top sản phẩm bán chạy</h6>
                            </div>
                            <div class="right">

                                <!-- end select -->
                            </div>
                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6 class="text-sm text-medium">Ảnh</h6>
                                        </th>
                                        <th>
                                            <h6 class="text-sm text-medium">Tên sản phẩm</h6>
                                        </th>

                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Giá
                                            </h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Đã bán
                                            </h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Doanh thu
                                            </h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($topproduct as $product)
                                        <tr>
                                            <td>
                                                <div class="product">
                                                    <div class="image">
                                                        <img src="{{ asset('public/assets/product/' . $product->image) }}"
                                                            alt="" />
                                                    </div>
                                                </div>


                                            </td>
                                            <td>
                                                <p class="text-sm">{{ $product->name }}</p>

                                            </td>

                                            <td>
                                                {{ number_format($product->price) }} <h5 style="color: rgb(130, 41, 214)">VND</h5>
                                            </td>
                                            <td>
                                                {{ $product->total_Product}} Cái
                                            </td>
                                            <td>
                                                {{ number_format($product->total_Product * $product->price)}} <h5 style="color: rgb(130, 41, 214)">VND</h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>

                <!-- End Col -->


                <!-- End Col -->
            </div>
            <!-- End Row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        @include('admin.layout.footer')
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ============ Theme Option Start ============= -->

    <div class="option-overlay"></div>
    <div class="option-box">
        <div class="option-header">
            <div>
                <h5>Theme Customizer</h5>
                <p class="text-gray">Customize and Preview in Real time</p>
            </div>
            <button class="option-btn-close text-gray">
                <i class="lni lni-close"></i>
            </button>
        </div>
        <h6 class="mb-10">Sidebar</h6>
        <ul class="mb-30">
            <li><button class="leftSidebarButton active">Left Sidebar</button></li>
            <li><button class="rightSidebarButton">Right Sidebar</button></li>
        </ul>

        <h6 class="mb-10">Theme</h6>
        <ul class="d-flex flex-wrap align-items-center">
            <li>
                <button class="lightThemeButton active">
                    Light Theme + Sidebar 1
                </button>
            </li>
            <li>
                <button class="lightThemeButton2">Light Theme + Sidebar 2</button>
            </li>
            <li><button class="darkThemeButton">Dark Theme + Sidebar 1</button></li>
            <li>
                <button class="darkThemeButton2">Dark Theme + Sidebar 2</button>
            </li>
        </ul>

        <div class="promo-box">
            <h3>PlainAdmin Pro</h3>
            <p>Get All Dashboards and 300+ UI Elements</p>
            <a href="https://plainadmin.com/pro" target="_blank" rel="nofollow"
                class="main-btn primary-btn btn-hover">
                Purchase Now
            </a>
        </div>
    </div>
    <!-- ============ Theme Option End ============= -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/apexcharts.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/quill.min.js"></script>
    <script src="assets/js/datatable.js"></script>
    <script src="assets/js/Sortable.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        // ======== jvectormap activation
        var markers = [{
                name: "Egypt",
                coords: [26.8206, 30.8025]
            },
            {
                name: "Russia",
                coords: [61.524, 105.3188]
            },
            {
                name: "Canada",
                coords: [56.1304, -106.3468]
            },
            {
                name: "Greenland",
                coords: [71.7069, -42.6043]
            },
            {
                name: "Brazil",
                coords: [-14.235, -51.9253]
            },
        ];

        var jvm = new jsVectorMap({
            map: "world_merc",
            selector: "#map",
            zoomButtons: true,

            regionStyle: {
                initial: {
                    fill: "#d1d5db",
                },
            },

            labels: {
                markers: {
                    render: (marker) => marker.name,
                },
            },

            markersSelectable: true,
            selectedMarkers: markers.map((marker, index) => {
                var name = marker.name;

                if (name === "Russia" || name === "Brazil") {
                    return index;
                }
            }),
            markers: markers,
            markerStyle: {
                initial: {
                    fill: "#4A6CF7"
                },
                selected: {
                    fill: "#ff5050"
                },
            },
            markerLabelStyle: {
                initial: {
                    fontWeight: 400,
                    fontSize: 14,
                },
            },
        });
        // ====== calendar activation
        document.addEventListener("DOMContentLoaded", function() {
            var calendarMiniEl = document.getElementById("calendar-mini");
            var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
                initialView: "dayGridMonth",
                headerToolbar: {
                    end: "today prev,next",
                },
            });
            calendarMini.render();
        });

        // =========== chart one start
        const ctx1 = document.getElementById("Chart1").getContext("2d");
        const chart1 = new Chart(ctx1, {
            // The type of chart we want to create
            type: "line", // also try bar or other graph types

            // The data for our dataset
            data: {
                labels: [
                    "Jan",
                    "Fab",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                // Information about the dataset
                datasets: [{
                    label: "",
                    backgroundColor: "transparent",
                    borderColor: "#4A6CF7",
                    data: [
                        600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
                    ],
                    pointBackgroundColor: "transparent",
                    pointHoverBackgroundColor: "#4A6CF7",
                    pointBorderColor: "transparent",
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 5,
                    pointBorderWidth: 5,
                    pointRadius: 8,
                    pointHoverRadius: 8,
                }, ],
            },

            // Configuration options
            defaultFontFamily: "Inter",
            options: {
                tooltips: {
                    callbacks: {
                        labelColor: function(tooltipItem, chart) {
                            return {
                                backgroundColor: "#ffffff",
                            };
                        },
                    },
                    intersect: false,
                    backgroundColor: "#f9f9f9",
                    titleFontFamily: "Inter",
                    titleFontColor: "#8F92A1",
                    titleFontColor: "#8F92A1",
                    titleFontSize: 12,
                    bodyFontFamily: "Inter",
                    bodyFontColor: "#171717",
                    bodyFontStyle: "bold",
                    bodyFontSize: 16,
                    multiKeyBackground: "transparent",
                    displayColors: false,
                    xPadding: 30,
                    yPadding: 10,
                    bodyAlign: "center",
                    titleAlign: "center",
                },

                title: {
                    display: false,
                },
                legend: {
                    display: false,
                },

                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawTicks: false,
                            drawBorder: false,
                        },
                        ticks: {
                            padding: 35,
                            max: 1200,
                            min: 500,
                        },
                    }, ],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(143, 146, 161, .1)",
                            zeroLineColor: "rgba(143, 146, 161, .1)",
                        },
                        ticks: {
                            padding: 20,
                        },
                    }, ],
                },
            },
        });

        // =========== chart one end

        // =========== chart two start
        const ctx2 = document.getElementById("Chart2").getContext("2d");
        const chart2 = new Chart(ctx2, {
            // The type of chart we want to create
            type: "bar", // also try bar or other graph types
            // The data for our dataset
            data: {
                labels: [
                    "Jan",
                    "Fab",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                // Information about the dataset
                datasets: [{
                    label: "",
                    backgroundColor: "#4A6CF7",
                    barThickness: 6,
                    maxBarThickness: 8,
                    data: [
                        600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
                    ],
                }, ],
            },
            // Configuration options
            options: {
                borderColor: "#F3F6F8",
                borderWidth: 15,
                backgroundColor: "#F3F6F8",
                tooltips: {
                    callbacks: {
                        labelColor: function(tooltipItem, chart) {
                            return {
                                backgroundColor: "rgba(104, 110, 255, .0)",
                            };
                        },
                    },
                    backgroundColor: "#F3F6F8",
                    titleFontColor: "#8F92A1",
                    titleFontSize: 12,
                    bodyFontColor: "#171717",
                    bodyFontStyle: "bold",
                    bodyFontSize: 16,
                    multiKeyBackground: "transparent",
                    displayColors: false,
                    xPadding: 30,
                    yPadding: 10,
                    bodyAlign: "center",
                    titleAlign: "center",
                },

                title: {
                    display: false,
                },
                legend: {
                    display: false,
                },

                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawTicks: false,
                            drawBorder: false,
                        },
                        ticks: {
                            padding: 35,
                            max: 1200,
                            min: 0,
                        },
                    }, ],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                            color: "rgba(143, 146, 161, .1)",
                            zeroLineColor: "rgba(143, 146, 161, .1)",
                        },
                        ticks: {
                            padding: 20,
                        },
                    }, ],
                },
            },
        });
        // =========== chart two end

        // =========== chart three start
        const ctx3 = document.getElementById("Chart3").getContext("2d");
        const chart3 = new Chart(ctx3, {
            // The type of chart we want to create
            type: "line", // also try bar or other graph types

            // The data for our dataset
            data: {
                labels: [
                    "Jan",
                    "Fab",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                // Information about the dataset
                datasets: [{
                        label: "Revenue",
                        backgroundColor: "transparent",
                        borderColor: "#4a6cf7",
                        data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
                        pointBackgroundColor: "transparent",
                        pointHoverBackgroundColor: "#4a6cf7",
                        pointBorderColor: "transparent",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 3,
                        pointBorderWidth: 5,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    },
                    {
                        label: "Profit",
                        backgroundColor: "transparent",
                        borderColor: "#9b51e0",
                        data: [
                            120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
                        ],
                        pointBackgroundColor: "transparent",
                        pointHoverBackgroundColor: "#9b51e0",
                        pointBorderColor: "transparent",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 3,
                        pointBorderWidth: 5,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    },
                    {
                        label: "Order",
                        backgroundColor: "transparent",
                        borderColor: "#f2994a",
                        data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
                        pointBackgroundColor: "transparent",
                        pointHoverBackgroundColor: "#f2994a",
                        pointBorderColor: "transparent",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 3,
                        pointBorderWidth: 5,
                        pointRadius: 5,
                        pointHoverRadius: 8,
                    },
                ],
            },

            // Configuration options
            options: {
                tooltips: {
                    intersect: false,
                    backgroundColor: "#fbfbfb",
                    titleFontColor: "#8F92A1",
                    titleFontSize: 16,
                    titleFontFamily: "Inter",
                    titleFontStyle: "400",
                    bodyFontFamily: "Inter",
                    bodyFontColor: "#171717",
                    bodyFontSize: 16,
                    multiKeyBackground: "transparent",
                    displayColors: false,
                    xPadding: 30,
                    yPadding: 15,
                    borderColor: "rgba(143, 146, 161, .1)",
                    borderWidth: 1,
                    title: false,
                },

                title: {
                    display: false,
                },

                layout: {
                    padding: {
                        top: 0,
                    },
                },

                legend: false,

                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawTicks: false,
                            drawBorder: false,
                        },
                        ticks: {
                            padding: 35,
                            max: 300,
                            min: 50,
                        },
                    }, ],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(143, 146, 161, .1)",
                            zeroLineColor: "rgba(143, 146, 161, .1)",
                        },
                        ticks: {
                            padding: 20,
                        },
                    }, ],
                },
            },
        });
        // =========== chart three end

        // ================== chart four start
        const ctx4 = document.getElementById("Chart4").getContext("2d");
        const chart4 = new Chart(ctx4, {
            // The type of chart we want to create
            type: "bar", // also try bar or other graph types
            // The data for our dataset
            data: {
                labels: ["Jan", "Fab", "Mar", "Apr", "May", "Jun"],
                // Information about the dataset
                datasets: [{
                        label: "",
                        backgroundColor: "#4A6CF7",
                        barThickness: "flex",
                        maxBarThickness: 8,
                        data: [600, 700, 1000, 700, 650, 800],
                    },
                    {
                        label: "",
                        backgroundColor: "#d50100",
                        barThickness: "flex",
                        maxBarThickness: 8,
                        data: [690, 740, 720, 1120, 876, 900],
                    },
                ],
            },
            // Configuration options
            options: {
                borderColor: "#F3F6F8",
                borderWidth: 15,
                backgroundColor: "#F3F6F8",
                tooltips: {
                    callbacks: {
                        labelColor: function(tooltipItem, chart) {
                            return {
                                backgroundColor: "rgba(104, 110, 255, .0)",
                            };
                        },
                    },
                    backgroundColor: "#F3F6F8",
                    titleFontColor: "#8F92A1",
                    titleFontSize: 12,
                    bodyFontColor: "#171717",
                    bodyFontStyle: "bold",
                    bodyFontSize: 16,
                    multiKeyBackground: "transparent",
                    displayColors: false,
                    xPadding: 30,
                    yPadding: 10,
                    bodyAlign: "center",
                    titleAlign: "center",
                },

                title: {
                    display: false,
                },
                legend: {
                    display: false,
                },

                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawTicks: false,
                            drawBorder: false,
                        },
                        ticks: {
                            padding: 35,
                            max: 1200,
                            min: 0,
                        },
                    }, ],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                            color: "rgba(143, 146, 161, .1)",
                            zeroLineColor: "rgba(143, 146, 161, .1)",
                        },
                        ticks: {
                            padding: 20,
                        },
                    }, ],
                },
            },
        });
        // =========== chart four end
    </script>
</body>

</html>
