<?php 
  $categories = loadListAll_danhmuc();
  $cateQuant = count($categories);

  $products = getProducts();
  $prodQuant = count($products);

  $users = getListUsers();
  $userQuant = count($users);

  $comments = getComments();
  $commQuant = count($comments);
?>
       
       <!-- partial -->
       <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="row align-items-center">
                      <div class="col-3">
                        <div class="icon icon-box-warning">
                          <span class="mdi mdi-shape-outline icon-item"></span>
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $cateQuant?></h3>
                          <p class=" ml-2 mb-0 font-weight-medium">Danh mục</p>
                        </div>
                      </div>
                      
                    </div>
                    <a href="#!" class="btn btn-warning text-white font-weight-normal w-75 mt-3">Chi tiết</a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="row align-items-center">
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-view-compact text-success icon-item"></span>
                        </div>
                      </div>

                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $prodQuant?></h3>
                          <p class="text-white ml-2 mb-0 font-weight-medium">Sản phẩm</p>
                        </div>
                      </div>
                      
                    </div>
                    <a href="#!" class="btn btn-success text-white font-weight-normal w-75 mt-3">Chi tiết</a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="row align-items-center">
                      <div class="col-3">
                        <div class="icon icon-box-primary">
                          <span class="mdi mdi-account-supervisor icon-item"></span>
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $userQuant?></h3>
                          <p class="text-white ml-2 mb-0 font-weight-medium">Khách hàng</p>
                        </div>
                      </div>
                      
                    </div>
                    <a href="#!" class="btn btn-primary text-white font-weight-normal w-75 mt-3">Chi tiết</a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="row align-items-center">
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-account-supervisor icon-item"></span>
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $commQuant?></h3>
                          <p class="text-white ml-2 mb-0 font-weight-medium">Bình luận</p>
                        </div>
                      </div>
                      
                    </div>
                    <a href="#!" class="btn btn-success text-white font-weight-normal w-75 mt-3">Chi tiết</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- categories -->
            
              <?php include './danhmuc/list.php'; ?>
            <!-- end categories -->
            <!-- prodructs -->
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh mục</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th> Client Name </th>
                            <th> Order No </th>
                            <th> Product Cost </th>
                            <th> Project </th>
                            <th> Payment Mode </th>
                            <th> Start Date </th>
                            <th> Payment Status </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face1.jpg" alt="image" />
                              <span class="pl-2">Henry Klein</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Dashboard </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face2.jpg" alt="image" />
                              <span class="pl-2">Estella Bryan</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Cash on delivered </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face5.jpg" alt="image" />
                              <span class="pl-2">Lucy Abbott</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> App design </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-danger">Rejected</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face3.jpg" alt="image" />
                              <span class="pl-2">Peter Gill</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Development </td>
                            <td> Online Payment </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face4.jpg" alt="image" />
                              <span class="pl-2">Sallie Reyes</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end products -->
          </div>
          <!-- content-wrapper ends -->