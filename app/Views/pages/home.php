<?php echo $this->extend('layout/template');?>
<?php echo $this->section('content');?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Welcome <small><?php echo session()->fullname;?></small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('/pages/home');?>">KTalk</a></li>
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card direct-chat direct-chat-primary">
            <div class="card-header">
              <h3 class="card-title">KTalk</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="height: 325px;">
              <div class="direct-chat-messages" style="height: 325px;">
                <div id="chatime"></div>
              </div>
            </div>
            <div class="card-footer">
              <form id="addMessage" action="" method="post">
                <div class="input-group">
                  <input type="text" name="message" id="message" placeholder="Write Message" class="form-control" autocomplete="off">
                  <input type="hidden" name="email" id="email" value="<?php echo session()->email;?>">
                  <input type="hidden" name="datetime" id="datetime" value="<?php echo date('Y-m-d H:i:s');?>">
                  <input type="hidden" name="fullname" id="fullname" value="<?php echo session()->fullname;?>">
                  <span class="input-group-append">
                    <button id="submitMessage" type="button" class="btn btn-primary">Send</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection();?>