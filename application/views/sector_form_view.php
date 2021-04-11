  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo Sector</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre del Sector</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introducir sector" value="<?php echo isset($sector) ? $sector->nombre : ''; ?>">
                </div>
                <div class="form-group">
                  <label>Padre del Sector</label>
                  <select class="form-control select2" name="idPadre" style="width: 100%;">
                          <option></option>
                      <?php foreach ($sectors as $sec): ?>
                          <option value="<?php echo $sec->id; ?>" <?php echo ($sec->id==@$sector->idPadre) ? 'selected' : ''; ?>><?php echo $sec->nombre; ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>

  <!-- Page script -->
<script>
  $(function () {
  //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>