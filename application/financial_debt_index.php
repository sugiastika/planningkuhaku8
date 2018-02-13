<?php
    include "../config/preference.php";

    session_start();
    if (!isset($_SESSION['username'])){
        header ("location:../index.php");
    }
    include '../config/profil.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Hutang</title>
    <?php include '../config/top.php'; ?>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php include '../config/header.php'; ?>
    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <?php include '../config/sidebar_user.php'; ?>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Keuangan</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./financial_index.php"><i class="fa fa-eye"></i>Lihat</a></li>
                        <li><a href="./financial_owe_index.php"><i class="fa fa-plus"></i>Daftar Yang Berutang</a></li>
                        <li class="active"><a><i class="fa fa-minus"></i>Daftar Hutang</a></li>
                    </ul>
                </li>
                <li>
                    <a href="./buy_index.php">
                        <i class="fa fa-tasks"></i> <span>Barang Akan Dibeli</span>
                    </a>
                </li>
                <li>
                    <a href="./history_index.php">
                        <i class="fa fa-check-circle"></i> <span>Barang Sudah Dibeli</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar
                <small>Hutang</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="./home.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a>Keuangan</a></li>
                <li class="active">Daftar Hutang</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Hutang</h3>
                        </div>
                        <div class="box-body">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tambah">
                                <i class="fa fa-plus"></i>&nbsp&nbspTambah
                            </button>
                        </div>
                        <!-- /.box-header -->
                        <?php if($num_results_berhutang>0){ ?>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=1; while($row = $result_berhutang->fetch_assoc()){extract($row); ?>
                                        <tr>
                                            <td><?php echo "$no" ?></td>
                                            <td><?php echo "$nama_berhutang" ?></td>
                                            <td>
                                                <table width="90">
                                                    <tr>
                                                        <td>Rp</td>
                                                        <td align="right"><?php echo number_format("$jumlah_berhutang",0,",",".") ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <?php $no++;} ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        <?php }else{ ?>
                            No records found.
                            <?php
                        }
                        $result_berhutang->free();
                        $mysqli->close();
                        ?>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php include '../config/footer.php'; ?>
<?php include '../config/bottom.php'; ?>
</div>
<div class="modal modal-danger fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambahkan Barang</h4>
            </div>
            <?php include './financial_debt_create.php'; ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</body>
</html>