<main class="main-wrapper">
    @include('admin.layout.header')
    <section class="section">
      <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title mb-30">
                <h2>eCommerce Dashboard</h2>
              </div>
            </div>
            <!-- end col -->
    
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon purple">
                <i class="lni lni-cart-full"></i>
              </div>
              <div class="content">
                <h6 class="mb-10">New Orders</h6>
                <h3 class="text-bold mb-10">34567</h3>
                <p class="text-sm text-success">
                  <i class="lni lni-arrow-up"></i> +2.00%
                  <span class="text-gray">(30 days)</span>
                </p>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon success">
                <i class="lni lni-dollar"></i>
              </div>
              <div class="content">
                <h6 class="mb-10">New Products</h6>
                <h3 class="text-bold mb-10">$74,567</h3>
                <p class="text-sm text-success">
                  <i class="lni lni-arrow-up"></i> +5.45%
                  <span class="text-gray">Increased</span>
                </p>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon primary">
                <i class="lni lni-credit-cards"></i>
              </div>
              <div class="content">
                <h6 class="mb-10">New Users</h6>
                <h3 class="text-bold mb-10">$24,567</h3>
                <p class="text-sm text-danger">
                  <i class="lni lni-arrow-down"></i> -2.00%
                  <span class="text-gray">Expense</span>
                </p>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon orange">
                <i class="lni lni-user"></i>
              </div>
              <div class="content">
                <h6 class="mb-10">Total</h6>
                <h3 class="text-bold mb-10">34567</h3>
                <p class="text-sm text-danger">
                  <i class="lni lni-arrow-down"></i> -25.00%
                  <span class="text-gray"> Earning</span>
                </p>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-30">
              <div class="title d-flex flex-wrap justify-content-between">
                <div class="left">
                  <h6 class="text-medium mb-10">Yearly Starts</h6>
                  <h3 class="text-bold">$245,479</h3>
                </div>
    
              </div>
              <!-- End Title -->
              <div class="chart">
                <canvas
                  id="Chart1"
                  style="width: 100%; height: 400px"
                ></canvas>
              </div>
              <!-- End Chart -->
            </div>
          </div>
          <!-- End Col -->
    
          <!-- End Col -->
        </div>
        <!-- End Row -->
    
        <!-- End Row -->
    
        <!-- End Row -->
        <div class="row">
          <div class="col-lg-5">
            <div class="card-style calendar-card mb-30">
              <div id="calendar-mini"></div>
            </div>
          </div>
          <!-- End Col -->
          <div class="col-lg-7">
            <div class="card-style mb-30">
              <div
                class="title d-flex flex-wrap align-items-center justify-content-between"
              >
                <div class="left">
                  <h6 class="text-medium mb-30">SHOPS</h6>
                </div>
    
              </div>
              <!-- End Title -->
              <div class="table-responsive">
                <table class="table top-selling-table">
                  <thead>
                    <tr>
                      <th>
                        <h6 class="text-sm text-medium">Products</h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Category
                        </h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Revenue
                        </h6>
                      </th>
                      <th class="min-width">
                        <h6 class="text-sm text-medium">
                          Status
                        </h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img
                              src="assets/images/products/product-mini-1.jpg"
                              alt=""
                            />
                          </div>
                          <p class="text-sm">Bedroom</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">Interior</p>
                      </td>
                      <td>
                        <p class="text-sm">$345</p>
                      </td>
                      <td>
                        <span class="status-btn close-btn">Pending</span>
                      </td>
     
                    </tr>
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img
                              src="assets/images/products/product-mini-2.jpg"
                              alt=""
                            />
                          </div>
                          <p class="text-sm">Arm Chair</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">Interior</p>
                      </td>
                      <td>
                        <p class="text-sm">$345</p>
                      </td>
                      <td>
                        <span class="status-btn warning-btn">Refund</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img
                              src="assets/images/products/product-mini-3.jpg"
                              alt=""
                            />
                          </div>
                          <p class="text-sm">Sofa</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">Interior</p>
                      </td>
                      <td>
                        <p class="text-sm">$345</p>
                      </td>
                      <td>
                        <span class="status-btn success-btn">Completed</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="product">
                          <div class="image">
                            <img
                              src="assets/images/products/product-mini-4.jpg"
                              alt=""
                            />
                          </div>
                          <p class="text-sm">Kitchen</p>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm">Interior</p>
                      </td>
                      <td>
                        <p class="text-sm">$345</p>
                      </td>
                      <td>
                        <span class="status-btn close-btn">Canceled</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table -->
              </div>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- end container -->
    </section>
        @include('admin.layout.footer')
        <!-- ========== header start ========== -->
    
        <!-- ========== header end ========== -->
    
        <!-- ========== section start ========== -->
        {{-- <section class="section">
          <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="title mb-30">
                    <h2>Manager Page</h2>
                  </div>
                </div>
              </div>
              <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div class="row">
              <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                  <div class="content">
                    <h6 class="mb-10">New Orders</h6>
                    <h3 class="text-bold mb-10">34567</h3>
                    <p class="text-sm text-success">
                        <i class="bi bi-bag-heart"></i> +3.24%
                    </p>
                  </div>
                </div>
                <!-- End Icon Cart -->
              </div>
              <!-- End Col -->
              <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                  <div class="content">
                    <h6 class="mb-10">New Products</h6>
                    <h3 class="text-bold mb-10">$74,567</h3>
                    <p class="text-sm text-success">
                        <i class="bi bi-bag-heart"></i> +5.45%
                    </p>
                  </div>
                </div>
                <!-- End Icon Cart -->
              </div>
              <!-- End Col -->
              <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                  <div class="content">
                    <h6 class="mb-10">New Users</h6>
                    <h3 class="text-bold mb-10">$24,567</h3>
                    <p class="text-sm text-danger">
                        <i class="bi bi-bag-heart"></i>2.00%
                    </p>
                  </div>
                </div>
                <!-- End Icon Cart -->
              </div>
              <!-- End Col -->
              <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                  <div class="content">
                    <h6 class="mb-10">Total</h6>
                    <h3 class="text-bold mb-10">34567</h3>
                    <p class="text-sm text-danger">
                        <i class="bi bi-bag-heart"></i>25.00%
                    </p>
                  </div>
                </div>
                <!-- End Icon Cart -->
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="title d-flex flex-wrap justify-content-between">
                    <div class="left">
                      <h6 class="text-medium mb-10">Yearly Stats</h6>
                      <h3 class="text-bold">$245,479</h3>
                    </div>
                  </div>
                  <!-- End Title -->
                  <div class="chart">
                    <canvas
                      id="Chart1"
                      style="width: 100%; height: 400px"
                    ></canvas>
                  </div>
                  <!-- End Chart -->
                </div>
              </div>
              <!-- End Col -->
              
              <!-- End Col -->
            </div>
            <!-- End Row -->
            
            <!-- End Row -->
            
            <!-- End Row -->
            <div class="row">
              <div class="col-lg-5">
                <div class="card-style calendar-card mb-30">
                  <div id="calendar-mini"></div>
                </div>
              </div>
              <!-- End Col -->
              <div class="col-lg-7">
                <div class="card-style mb-30">
                  <div
                    class="title d-flex flex-wrap align-items-center justify-content-between"
                  >
                    <div class="left">
                      <h6 class="text-medium mb-30">Products</h6>
                    </div>
                  </div>
                  <!-- End Title -->
                  <div class="table-responsive">
                    <table class="table top-selling-table">
                      <thead>
                        <tr>
                          <th>
                            <h6 class="text-sm text-medium">Products</h6>
                          </th>
                          <th class="min-width">
                            <h6 class="text-sm text-medium">
                              Category <i class="lni lni-arrows-vertical"></i>
                            </h6>
                          </th>
                          <th class="min-width">
                            <h6 class="text-sm text-medium">
                              Revenue <i class="lni lni-arrows-vertical"></i>
                            </h6>
                          </th>
                          <th class="min-width">
                            <h6 class="text-sm text-medium">
                              Status <i class="lni lni-arrows-vertical"></i>
                            </h6>
                          </th>
                          <th>
    
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="product">
                              <div class="image">
                                <img
                                  src="assets/images/products/product-mini-1.jpg"
                                  alt=""
                                />
                              </div>
                              <p class="text-sm">Bedroom</p>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm">Interior</p>
                          </td>
                          <td>
                            <p class="text-sm">$345</p>
                          </td>
                          <td>
                            <span class="status-btn close-btn">Pending</span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="product">
                              <div class="image">
                                <img
                                  src="assets/images/products/product-mini-2.jpg"
                                  alt=""
                                />
                              </div>
                              <p class="text-sm">Arm Chair</p>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm">Interior</p>
                          </td>
                          <td>
                            <p class="text-sm">$345</p>
                          </td>
                          <td>
                            <span class="status-btn warning-btn">Refund</span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="product">
                              <div class="image">
                                <img
                                  src="assets/images/products/product-mini-3.jpg"
                                  alt=""
                                />
                              </div>
                              <p class="text-sm">Sofa</p>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm">Interior</p>
                          </td>
                          <td>
                            <p class="text-sm">$345</p>
                          </td>
                          <td>
                            <span class="status-btn success-btn">Completed</span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="product">
                              <div class="image">
                                <img
                                  src="assets/images/products/product-mini-4.jpg"
                                  alt=""
                                />
                              </div>
                              <p class="text-sm">Kitchen</p>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm">Interior</p>
                          </td>
                          <td>
                            <p class="text-sm">$345</p>
                          </td>
                          <td>
                            <span class="status-btn close-btn">Canceled</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- End Table -->
                  </div>
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
          <!-- end container -->
        </section> --}}
        <!-- ========== section end ========== -->
    
        <!-- ========== footer start =========== -->
        
        <!-- ========== footer end =========== -->
      </main>