<?php

include 'prosesAddNewProduct.php';

 require'cekSesion.php';
$RepositoryProduct = new RepositoryProduct();
$index = 1;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Negunah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                </div>
                
                <!-- Modal body -->
                <form method="post">S
                    <div class="modal-body">
                        <input type="text" name="productName" placeholder="Product Name" class="form-control" required="">
                        <br>
                        <input type="number" name="price" placeholder="Price" class="form-control" required="">  
                        <br>
                        <button type="submit" class="btn btn-primary" name="addNewProduct">Submit</button>        
                    </div>
                </form>
                
                
                 
                
              </div>
            </div>
         </div>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Ngeunah Corporation</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
                        <!-- Navbar-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>

                            <?php require_once("viewSideBar.php");

                                $icon1 = new viewSideBar("Dashboard", "tachometer-alt", "index.php");

                                $icon2 = $icon1->clone();
                                $icon2->setNama("Cash In");
                                $icon2->setLink("cashIn.php");
                                $icon2->setIcon("pen");

                                $icon3 = $icon2->clone();
                                $icon3->setNama("Cash Out");
                                $icon3->setLink("cashOut.php");
                                

                                $icon4 = $icon1->clone();
                                $icon4->setNama("Print Out");
                                $icon4->setLink("index.php");
                                $icon4->setIcon("marker");

                                $icon5 = $icon1->clone();
                                $icon5->setNama("Logout");
                                $icon5->setLink("logout.php");

                                echo $icon1->createNavItem();
                                
                                
                                
                            ?>

                            <div class="sb-sidenav-menu-heading">Input</div>

                            <?php echo $icon2->createNavItem();
                            echo $icon3->createNavItem();?>

                            <div class="sb-sidenav-menu-heading">Print Out</div>
                            <?= $icon4->createNavItem();?>

                            <?= $icon5->createNavItem(); ?>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Daily Income
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">14.000.000</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Cash Out</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">8.000.000</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Total Cash In</a>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                           
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Add New Product
                                </button>
                            </div>
                            
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>    

                                    <tbody>
                                    <?php
                                    $result = $RepositoryProduct->tampil_data();
                                    if ( !empty($result) ) {
                                        foreach ($result as $data): ?>
                                            <tr>
                                                <td><?=$index++ ?></td>
                                                <td><?=$data->productName ?></td>
                                                <td><?=$data->price ?></td>
                                                <td>
                                                    <a name="edit" id="edit" href="edit.php?productName=<?=$data->idProduct ?>">Edit</a>
                                                    <a name="hapus" id="hapus" href="prosesAddNewProduct.php?productName=<?=$data->productName ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                    } else{ ?>
                                        <tr>
                                            <td colspan="9">Belum ada data pada tabel nilai mahasiswa.</td>
                                        </tr>
                                    <?php } ?>                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    
</html>
