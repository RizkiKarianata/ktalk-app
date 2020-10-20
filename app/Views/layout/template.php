<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $title;?></title>
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('/assets/images/favicon.png');?>"/>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <?php echo $this->include('layout/navbar');?>
    <?php echo $this->renderSection('content');?>
    <?php echo $this->include('layout/footer');?>
  </div>
  <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
  <script>
    document.getElementById('message').onkeypress = function(e){
        if (!e) e = window.event;
        var keyCode = e.keyCode || e.which;
        if (keyCode == '13'){
          return false;
        }
      }
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
    firebase.database().ref('chating/').on('value', function (snapshot) {
      var value = snapshot.val();
      var htmls = [];
      $.each(value, function (index, value) {
        if(value) {
          if(value.email == "<?php echo session()->email;?>") {
            htmls.push('<div class="direct-chat-msg right">\
              <div class="direct-chat-infos clearfix">\
              <span class="direct-chat-name float-right">' + value.fullname + '</span>\
              <span class="direct-chat-timestamp float-left">' + value.datetime + '</span>\
              </div>\
              <img class="direct-chat-img" src="<?php echo base_url('assets/dist/img/user3-128x128.jpg');?>" alt="message user image">\
              <div class="direct-chat-text">'+ value.message + '</div>\
              </div');
          }else {
            htmls.push('<div class="direct-chat-msg">\
              <div class="direct-chat-infos clearfix">\
              <span class="direct-chat-name float-left">' + value.fullname + '</span>\
              <span class="direct-chat-timestamp float-right">' + value.datetime + '</span>\
              </div>\
              <img class="direct-chat-img" src="<?php echo base_url('assets/dist/img/user3-128x128.jpg');?>" alt="message user image">\
              <div class="direct-chat-text">'+ value.message + '</div>\
              </div');            
          }
        }
        console.log(value);
        lastIndex = index;
      });
      $('#chatime').html(htmls);
      $("#submitMessage").removeClass('disabled');
    });
    $('#submitMessage').on('click', function () {
      var values = $("#addMessage").serializeArray();
      var message = values[0].value;
      var email = values[1].value;
      var datetime = values[2].value;
      var fullname = values[3].value;
      var userID = lastIndex + 1;

      firebase.database().ref('chating/' + userID).set({
        message: message,
        email: email,
        datetime: datetime,
        fullname: fullname,
      });
      lastIndex = userID;
      $("#addMessage input").val("");
    });
  </script>
</body>
</html>