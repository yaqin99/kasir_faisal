<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_front/header.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("admin/_front/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("admin/_front/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view("admin/_front/breadcrumb.php") ?>

        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

         <?php if ($this->session->flashdata('danger')): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $this->session->flashdata('danger'); ?>
        </div>
        <?php endif; ?>

        <!-- DataTables -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo site_url('admin/user/tambah') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user as $user): ?>
                  <tr>
                    <td>
                      <?php echo $user->username ?>
                    </td>
                    <td>
                      <?php echo $user->level ?>  
                    </td>                    
                    <td width="250">
                      <a href="<?php echo site_url('admin/user/ubah/'.$user->id_user) ?>"
                       class="btn btn-small"><i class="fas fa-edit"></i>Ubah</a>
                      <a onclick="deleteConfirm('<?php echo site_url('admin/user/hapus/'.$user->id_user) ?>')"
                       href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("admin/_front/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  
  <!-- /#wrapper -->
  <?php $this->load->view("admin/_front/scrolltop.php") ?>
  <?php $this->load->view("admin/_front/modal.php") ?>

  <?php $this->load->view("admin/_front/js.php") ?>

  <script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
  }
  </script>
</body>

</html>