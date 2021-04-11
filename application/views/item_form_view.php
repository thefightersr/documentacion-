  <style>
    .containerInput {
        margin-top: 13px;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
		<?php
			$existItem = isset($item) ? true : false;
		?>
    
    <!-- Main content -->
    <form role="form" method="post">
      <input type="hidden" name="usuario">
      <!-- <input type="hidden" name="estado"> -->
      <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?php echo isset($item) ? 'Editar Documentación' : 'Nueva Documentación' ?> </h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                    <div class="box-body">
                        <div class="form-group col-md-10 col-sm-10">
                          <label for="titulo">Titulo</label>
                          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Introducir titulo" value="<?php echo isset($item) ? $item->titulo : '' ?>">
                        </div>
                        <div class="form-group col-md-2 col-sm-2">
                          <label for=""></label>
                          <label class="containerInput" title="Activar/Desactivar">Activa <input type="checkbox" name="estado" value="1" <?php print((isset($existItem) && $item->estado)? 'checked' : ''); ?>><span class="checkmark"></span></label>
                        </div>
                        <div class="form-group col-md-3">
                          <label>Sector</label>
                          <select class="form-control select2" name="sector" style="width: 100%;">
                                  <option></option>
                              <?php foreach ($sectors as $sector): ?>
                                  <option value="<?php echo $sector->id; ?>" <?php echo (@$item->sector==$sector->id)?'selected':'';  ?>><?php echo $sector->nombre; ?></option>
                              <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Etiquetas</label>
                          <select class="form-control etiquetas" name="etiquetas[]" multiple="multiple" data-placeholder="Seleccione etiquetas"
                                  style="width: 100%;">
                              <?php foreach ($tags as $tag): ?>
                                <option value="<?php echo $tag->id; ?>" 
                                  <?php foreach ($itemsTags as $it){ 
                                    echo ($it->idItem == @$item->id && $it->idTag == $tag->id) ? 'selected' : '';  
                                  } ?>>
                                  <?php echo $tag->nombre; ?>
                                </option>
                              <?php endforeach ?>
                          </select>
                        </div>
                        <!-- Date -->
                        <div class="form-group col-md-3">
                          <label>Fecha</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control pull-right" name="fecha" value="<?php echo isset($item) ? $item->fecha : FunctionsLibrary::fechaActualMysql(); ?>">
                          </div>
                          <!-- /.input group -->
                        </div>
                    </div>
                    <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Texto
                  </h3>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                  <form>
                        <textarea id="editor1" name="texto" rows="30" cols="80">
                                                <?php echo isset($item) ? htmlentities($item->texto) : '' ?>
                        </textarea>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-group col-md-2 col-md-offset-5 text-center">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Guardar</button>
            </div>
          </div>
      </section>

    </form>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<script>

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('.etiquetas').select2()

    
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    /* The todo list plugin */
    $('.todo-list').todoList({
      onCheck  : function () {
        window.console.log($(this), 'The element has been checked');
      },
      onUnCheck: function () {
        window.console.log($(this), 'The element has been unchecked');
      }
    });
  })

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
  })
</script>
