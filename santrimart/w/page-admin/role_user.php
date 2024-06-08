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
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Iklan</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="divider">
                    <div class="divider-text">
                        <h3 class="mb-3 display-4 text-uppercase">Data Informasi</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-12 pb-5">
                        <form method="post" action="../aksi/add_ads.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 pb-1">
                                    <div class="font-small-2 mb-1">Judul</div>
                                    <fieldset>
                                        <div class="input-group">
                                            <input type="text" name="judul" class="form-control"
                                                placeholder="Tulis disini!">
                                            <div class="input-group-append" id="button-addon2">
                                                <button class="btn btn-primary rounded-0" type="button">
                                                    <i class="fas fa-align-center"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12">
                                    <div class="font-small-2 mb-1">File</div>
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12">
                                    <div class="font-small-2 mb-1 mt-1">Kategori Iklan</div>
                                    <select name="kategori" id="kategori" class="form-control select2">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="1">Header All Page</option>
                                        <option value="2">Promo Landingpage</option>
                                        <option value="3">Slide</option>
                                    </select>

                                </div>

                                <div class="col-12 mt-1 mb-2">
                                    <div class="font-small-2 mb-1">Keterangan</div>
                                    <fieldset class="form-label-group mb-0">
                                        <textarea data-length=100 class="form-control char-textarea" rows="3"
                                            name="keterangan" placeholder="Isi  Disini"></textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                                        karakter</small>
                                </div>

                                <div class="col-12 mt-1 mb-2">
                                    <input type="submit" name="upload_ads" value="Upload"
                                        class="btn btn-primary rounded-0" />
                                    <input type="reset" value="Cancel" onClick="hide(0)"
                                        class="btn btn-danger rounded-0" />
                                </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="badge badge-primary float-right">
                        <?php $sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_slide");
            $jumlah_user = mysqli_num_rows($sql_user); ?>
                        <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
                            <?php echo $jumlah_user ?></span>Total Iklan
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>ADS</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $ketQuery = "SELECT * FROM tabel_slide";
                $executeSat = mysqli_query($koneksi, $ketQuery);
                while ($b = mysqli_fetch_array($executeSat)) {
                  // print_r($b);
                ?>
                                <tr>
                                    <td><?php echo $b['id_slide'] ?></td>
                                    <td><?php echo $b['kat_slide'] ?></td>

                                    <td><?php echo $b['judul_slide'] ?></td>
                                    <td>
                                        <a onclick="show(<?php echo $b['id_slide'] ?>)">
                                            <i class="fas fa-edit"></i></a>
                                        <a class="action-delete" onclick="deleteImage(<?php echo $b['id_slide'] ?>)"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori</th>
                                    <th>ADS</th>
                                    <th>Edit</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <!-- END: Content-->
        </div>
    </div>

    <!---------------------------------------- Modal Kategori ------------------------------------>
    <div class="modal fade text-left" id="kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i>
                        Tambahkan kategori baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <form method="post" class="form-kategori">
                        <div class="row">
                            <div class="col-12">
                                <div class="font-small-2 mb-1">Icon</div>
                                <fieldset class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="ip-logo" id="logo"
                                            accept="image/png, image/gif, image/jpeg">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <div class="font-small-2 mb-1">Nama Kategori</div>
                                <fieldset class="form-group">
                                    <div class="custom-file">
                                        <input type="text" name="ip-kat" class="form-control" placeholder="Isi disini"
                                            id="defaultForm-kat" />
                                    </div>
                                </fieldset>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" name="submit-kategori" id="submit-kategori" class="btn btn-dark"
                        data-dismiss="modal">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------- Modal Kategori ------------------------------------>


<!---------------------------------------- Modal ads------------------------------------>
<div class="modal fade" id="modal_ads" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Ubah Data
                    Informasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 pb-1">
                            <div class="font-small-2 mb-1">Judul</div>
                            <fieldset>
                                <div class="input-group">
                                    <input type="hidden" class="form-control" id="id_hidden" name="id">
                                    <input type="text" class="form-control" placeholder="Tulis disini!">
                                    <div class="input-group-append" id="button-addon2">
                                        <button class="btn btn-primary rounded-0" type="button">
                                            <i class="fas fa-align-center"></i></button>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="font-small-2 mb-1">File</div>
                            <fieldset class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="font-small-2 mb-1 mt-1">Kategori Iklan</div>
                            <select name="kategori" class="form-control select2">
                                <option disabled selected>Pilih Kategori</option>
                                <option value="header">Header All Page</option>
                                <option value="landingpage">Promo Landingpage</option>
                                <option value="slide">Slide</option>
                            </select>

                        </div>

                        <div class="col-12 mt-1 mb-2">
                            <div class="font-small-2 mb-1">Keterangan</div>
                            <fieldset class="form-label-group mb-0">
                                <textarea data-length=100 class="form-control char-textarea" rows="3"
                                    name="">Isi disini</textarea>
                            </fieldset>
                            <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                                karakter</small>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" name="" value="Upload" class="btn btn-primary rounded-0" />
                <input type="reset" name="" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!---------------------------------------- Modal ads------------------------------------>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
let uploadButton1 = document.getElementById("upload-button1");
let chosenImage1 = document.getElementById("chosen-image1");

uploadButton1.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton1.files[0]);
    reader.onload = () => {
        chosenImage1.setAttribute("src", reader.result);
    }
}

function delete_image1() {
    chosenImage1.setAttribute("src", "")
}

let uploadButtonEdit1 = document.getElementById("edit-upload-button1");
let chosenImageEdit1 = document.getElementById("edit-chosen-image1");

uploadButtonEdit1.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButtonEdit1.files[0]);
    reader.onload = () => {
        chosenImageEdit1.setAttribute("src", reader.result);
    }
}

function edit_delete_image1() {
    chosenImageEdit1.setAttribute("src", "")
}

function deleteInfo(id) {
    $.ajax({
        type: "GET",
        url: "../aksi/delete_info.php?id=" + id,
        async: false,
        success: function(text) {
            alert(text);
        }
    });
}

function show(id) {
    var response = [];
    let text = "";
    $.ajax({
        type: "GET",
        url: "../aksi/show_info.php?id=" + id,
        async: false,
        success: function(text) {
            response = JSON.parse(text);
        }
    });

    console.log(response);
    $('#id_hidden').val(response.info.id_info);
    $('#judul').val(response.info.judul);
    $('#subjudul').val(response.info.subjudul);
    $('#desc').val(response.info.informasi);
    $('#kategori_edit option[value="' + response.info.kd_kategori_info + '"]').prop('selected', true).change();

    gambar = response.gambar.gambar
    if (gambar != null) {
        chosenImageEdit1.setAttribute("src", "../img/info/" + gambar);
    }
    $('#nm_gambar').text(response.gambar.gambar);
    $("#edit").modal('show');
}
</script>