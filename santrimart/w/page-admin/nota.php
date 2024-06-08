<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Nota</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- invoice functionality start -->
            <section class="invoice-print mb-1">
                <div class="row">
                    <fieldset class="col-12 col-md-5 mb-1 mb-md-0"></fieldset>
                    <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                        <button class="btn btn-danger btn-print mb-1 mb-md-0">
                            <i class="feather icon-file-text"></i> Print</button>
                    </div>
                </div>
            </section>
            <!-- invoice functionality end -->
            <!-- invoice page -->
            <section class="card invoice-page">
                <div id="invoice-template" class="card-body">
                    <!-- Invoice Company Details -->
                    <div id="invoice-company-details" class="row">
                        <div class="col-sm-6 col-12 text-left pt-1">
                            <div class="media pt-1">
                                <img src="../img/<?php echo $logo; ?>" width="100" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-right">
                            <h1>Invoice</h1>
                            <div class="invoice-details mt-2">
                                <h6>INVOICE NO.</h6>
                                <p><?php echo $_GET['faktur'] ?></p>
                                <h6 class="mt-2">INVOICE DATE</h6>
                                <p><?php echo $_GET['tgl'] ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/ Invoice Company Details -->

                    <!-- Invoice Recipient Details -->
                    <div id="invoice-customer-details" class="row pt-2">
                        <div class="col-sm-6 col-12 text-left">
                            <h5>Recipient</h5>
                            <div class="recipient-info my-2">
                                <p><?php echo $_GET['nama_penerima'] ?></p>
                                <p><?php echo $_GET['alamat'] ?></p>
                            </div>
                            <div class="recipient-contact pb-2">
                                <p>
                                    <i class="feather icon-mail"></i>
                                    <?php echo $_GET['email'] ?>
                                </p>
                                <p>
                                    <i class="feather icon-phone"></i>
                                    <?php echo $_GET['noTelp'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-right">
                            <h5>Merchant <?php echo $_GET['nama_merchant'] ?></h5>
                            <div class="company-info my-2">
                                <!-- <p>9 N. Sherwood Court</p> -->
                            </div>
                            <!-- <div class="company-contact">
                                <p>
                                    <i class="feather icon-mail"></i>
                                    hello@pixinvent.net
                                </p>
                                <p>
                                    <i class="feather icon-phone"></i>
                                    +91 999 999 9999
                                </p>
                            </div> -->
                        </div>
                    </div>
                    <!--/ Invoice Recipient Details -->

                    <!-- Invoice Items Details -->
                    <div id="invoice-items-details" class="pt-1 invoice-items-table">
                        <div class="row">
                            <div class="table-responsive col-12">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>NAMA BARANG</th>
                                            <th>HARGA</th>
                                            <th>JUMLAH</th>
                                            <th>AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $_GET['nama_barang'] ?></td>
                                            <td>Rp.<?php echo $_GET['bayar'] ?></td>
                                            <td><?php echo $_GET['jumlah'] ?></td>
                                            <td>Rp.<?php echo $_GET['subtotal'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="invoice-total-details" class="invoice-total-table">
                        <div class="row">
                            <div class="col-3 offset-5 ml-auto">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <!-- <tr>
                                                <th>SUBTOTAL</th>
                                                <td>Rp.<?php echo $_GET['subtotal'] ?></td>
                                            </tr> -->
                                            <!-- <tr>
                                                <th>DISCOUNT (5%)</th>
                                                <td>5700 USD</td>
                                            </tr> -->
                                            <tr>
                                                <th>TOTAL</th>
                                                <td>Rp.<?php echo $_GET['subtotal'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Footer -->
                    <!-- <div id="invoice-footer" class="text-right pt-3">
                        <p>Transfer the amounts to the business amount below. Please include invoice number on your
                            check.
                        <p class="bank-details mb-0">
                            <span class="mr-4">BANK: <strong>FTSBUS33</strong></span>
                            <span>IBAN: <strong>G882-1111-2222-3333</strong></span>
                        </p>
                    </div> -->
                    <!--/ Invoice Footer -->

                </div>
            </section>
            <!-- invoice page end -->

        </div>
    </div>
</div>
<!-- END: Content-->