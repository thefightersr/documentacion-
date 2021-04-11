  <style>
    .checkmark {
        position: absolute;
        top: -20px;
        left: 72px;
        height: 18px;
        width: 18px;
        background-color: #ccc;
    }
    .list-link {
        color: #333 !important;
        text-decoration: none !important;
    }
    .list-link:hover {
        color: #337ab7 !important;
        text-decoration: none !important;
        cursor: pointer;
    }
    .containerInput {
        position: absolute;
        right: 95px;
    }
    
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-book"></i> Listado Documentación</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="item-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titulo</th>
                  <th>Sector</th>
                  <th>Usuario</th>
                  <th>Fecha</th>
                  <th>
                    <a href="<?php echo base_url() ?>PanelController/edititem" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($items as $item): ?>
                    <tr>
                      <td><a href="<?php echo base_url() ?>PanelController/edititem/<?php echo $item->id; ?>"  class="list-link"><?php echo $item->titulo; ?></i></a></td>
                      <td><?php echo $item->nombreSector; ?></td>
                      <td>-</td>
                      <td><?php echo $item->fecha; ?></td>
                      <td class="text-center">
                          <a href="<?php echo base_url() ?>PanelController/edititem/<?php echo $item->id; ?>" class="list-link"><i class="fa fa-edit fa-lg"></i></a>
                          <a class="list-link delete-elem" data-id="<?php echo $item->id; ?>" data-table="item-table" data-url="<?php echo base_url() ?>PanelController/deleteItem/<?php echo $item->id; ?>"><i class="fa fa-trash-o fa-lg"></i></a>
                          <label class="containerInput" title="Activar/Desactivar"> <input type="checkbox" class="activateItem" data-id="<?php echo $item->id; ?>" value="1" <?php echo ($item->estado)?'checked':''; ?>><span class="checkmark"></span></label>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>

        <section class="col-lg-7 col-sm-12 connectedSortable">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-sitemap"></i> Listado Sector</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="sector-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sector</th>
                  <th>Padre</th>
                  <th>
                    <a href="<?php echo base_url() ?>PanelController/editSector" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($sectors as $sector): ?>
                    <tr>
                      <td>
                        <a href="<?php echo base_url() ?>PanelController/editSector/<?php echo $sector->id; ?>" class="list-link"><?php echo $sector->nombre; ?></i></a>
                      </td>
                      <td><?php echo $sector->nombrePadre; ?></td>
                      <td class="text-center">
                          <a href="<?php echo base_url() ?>PanelController/editSector/<?php echo $sector->id; ?>" class="list-link"><i class="fa fa-edit fa-lg"></i></a>
                          <a data-table="sector-table" data-url="<?php echo base_url() ?>PanelController/deleteSector/<?php echo $sector->id; ?>" class="list-link delete-elem"><i class="fa fa-trash-o fa-lg"></i></a>
                    </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>

        <section class="col-lg-5 col-sm-12 connectedSortable">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-tags"></i> Listado Tag</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tag-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tag</th>
                  <th>
                    <a href="<?php echo base_url() ?>PanelController/editTag" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar</a>
                  </th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($tags as $tag): ?>
                    <tr>
                      <td><a href="<?php echo base_url() ?>PanelController/editTag/<?php echo $tag->id; ?>" class="list-link"><?php echo $tag->nombre; ?></i></a></td>
                      <td class="text-center">
                          <a href="<?php echo base_url() ?>PanelController/editTag/<?php echo $tag->id; ?>" class="list-link"><i class="fa fa-edit fa-lg"></i></a>
                          <a  data-table="tag-table" data-url="<?php echo base_url() ?>PanelController/deleteTag/<?php echo $tag->id; ?>" class="list-link delete-elem"><i class="fa fa-trash-o fa-lg"></i></a>
                    </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper  -->
  <script>
    function deleteElem(elem) {
      var id = $(elem).attr('data-id');
      var tableId = $(elem).attr('data-table');
      var table = $('#'+tableId).DataTable();
      var url = $(elem).attr('data-url');

      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {
            var row = $(elem).parents('tr');
            table.row( $(row) ).remove().draw();
            // console.log("success");
      })
      .fail(function(data) {
        console.log("error: "+data);
      })
    }

  $(function () {

    $('.connectedSortable').on( 'click', 'tbody tr .delete-elem', function () {
        if (confirm('¿Desea eliminar el registro?')){
            deleteElem($(this));
        }
        
    });

    $('.activateItem').change(function(event) {
      var id = $(this).attr('data-id');
      var state = ($(this).prop('checked')) ? 1 : 0;

      $.ajax({
        url: '<?php echo base_url() ?>PanelController/updateState',
        type: 'POST',
        dataType: 'json',
        data: {id: id, state:state},
      })
      .done(function(data) {
        console.log("success");
      })
      .fail(function(data) {
        console.log("error: "+data);
      })
      
    });

    $('#item-table').DataTable( {
      "columnDefs": [
        { "width": "10%", "targets": 4, "orderable": false }
      ]
    } );

    $('#sector-table').DataTable( {
      "columnDefs": [
        { "width": "10%", "targets": 2, "orderable": false }
      ]
    } );

    $('#tag-table').DataTable( {
      "columnDefs": [
        { "width": "20%", "targets": 1, "orderable": false }
      ]
    } );

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
