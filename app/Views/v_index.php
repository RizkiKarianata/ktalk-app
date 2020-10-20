<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 
    <title>Tutorial Lengkap CRUD Codeigniter 4 dengan Firebase + Bootstrap</title>
 
</head>
<body>
 
<div class="container" style="margin-top: 50px;">
 
    <h4 class="text-center">Tutorial Lengkap CRUD Codeigniter 4 dengan Firebase + Bootstrap</h4><br>
 
    <h5># Tambah Siswa</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addStudent" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="nis" class="sr-only">Nomor Induk Siswa</label>
                    <input id="nis" type="text" class="form-control" name="nis" placeholder="Nomor Induk Siswa" required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="name" class="sr-only">Nama Siswa</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Nama Siswa" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label for="age" class="sr-only">Usia</label>
                    <input id="age" type="text" class="form-control" name="age" placeholder="Usia" required autofocus>
                </div>
                <button id="submitStudent" type="button" class="btn btn-primary mx-sm-3 mb-2">Tambah</button>
            </form>
        </div>
    </div>
 
    <br>
 
    <h5># Data Siswa</h5>
    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Usia</th>
            <th width="180" class="text-center">Action</th>
        </tr>
        <tbody id="tbody">
 
        </tbody>
    </table>
</div>
 
<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="updateBody">
 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-success updateStudent">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
 
<!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteStudent">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
 
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var firebaseConfig = {
        apiKey: "<?= ENV('apiKey') ?>",
        authDomain: "<?= ENV('authDomain') ?>",
        databaseURL: "<?= ENV('databaseURL') ?>",
        storageBucket: "<?= ENV('storageBucket') ?>",
        messagingSenderId: "<?= ENV('messagingSenderId') ?>",
        appId: "<?= ENV('appId') ?>",
        measurementId: "<?= ENV('measurementId') ?>",
        appId: "<?= ENV('appId') ?>"
    };
    firebase.initializeApp(firebaseConfig);
 
    var database = firebase.database();
 
    var lastIndex = 0;
 
    // Get Data
    firebase.database().ref('students/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + value.nis + '</td>\
                <td>' + value.name + '</td>\
                <td>' + value.age + '</td>\
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateStudent" data-id="' + index + '">Update</button>\
                <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeStudent" data-id="' + index + '">Delete</button></td>\
            </tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitStudent").removeClass('disabled');
    });
 
    // Add Data
    $('#submitStudent').on('click', function () {
        var values = $("#addStudent").serializeArray();
        var nis = values[0].value;
        var name = values[1].value;
        var age = values[2].value;
        var userID = lastIndex + 1;
 
        firebase.database().ref('students/' + userID).set({
            nis: nis,
            name: name,
            age: age,
        });
 
        // Reassign lastID value
        lastIndex = userID;
        $("#addStudent input").val("");
        // menampilkan alert
        alert("Berhasil menambah data");
    });
 
    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateStudent', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('students/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="edit_nis" class="col-md-12 col-form-label">Nomor Induk Siswa</label>\
                <div class="col-md-12">\
                    <input id="edit_nis" type="text" class="form-control" name="edit_nis" value="' + values.nis + '" placeholder="Nomor Induk Siswa" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="edit_name" class="col-md-12 col-form-label">Nama Lengkap</label>\
                <div class="col-md-12">\
                    <input id="edit_name" type="text" class="form-control" name="edit_name" value="' + values.name + '" placeholder="Nama Siswa" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="edit_age" class="col-md-12 col-form-label">Usia</label>\
                <div class="col-md-12">\
                    <input id="edit_age" type="text" class="form-control" name="edit_age" value="' + values.age + '" placeholder="Usia" required autofocus>\
                </div>\
            </div>';
 
            $('#updateBody').html(updateData);
        });
    });
 
    $('.updateStudent').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            nis: values[0].value,
            name: values[1].value,
            age: values[2].value,
        };
        var updates = {};
        updates['/students/' + updateID] = postData;
        firebase.database().ref().update(updates);
        // menyembunyikan modal 
        $("#update-modal").modal('hide');
        // menampilkan alert
        alert("Berhasil mengubah data");
    });
 
    // Remove Data
    $("body").on('click', '.removeStudent', function () {
        var id = $(this).attr('data-id');
        $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
    });
 
    $('.deleteStudent').on('click', function () {
        var values = $(".users-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.database().ref('students/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        // menyembunyikan modal
        $("#remove-modal").modal('hide');
        // menampilkan alert
        alert("Berhasil menghapus data");
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.users-remove-record-model').find("input").remove();
    });
</script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
</body>
</html>