<?php include_once 'session.php' ?>
<script src="js/curso.js"></script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cursos</h1>
    </div>
</div>
<hr />

<div class="row">
    <div class="col-lg-12">
        <h4>
            <button id="btn-crear" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrear">
                <i class="fa fa-book fa-fw"></i>
                <span>Crear</span>
            </button>
            <button id="btn-modificar" type="button" class="btn btn-primary" data-toggle="modal">
                <i class="fa fa-edit fa-fw"></i>
                <span>Modificar</span>
            </button>
            <button id="btn-eliminar" type="button" class="btn btn-danger" data-toggle="modal">
                <i class="fa fa-trash-o fa-fw"></i>
                <span>Eliminar</span>
            </button>
        </h4>
    </div>
</div>
<hr />

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered invisible" id="tabla-curso" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 text-center visible" id="tabla-curso-cargando">
        <img src="img/ajax-loader.gif" alt="cargando..."/>
    </div>
</div>


      <!-- Modal Crear -->
      <div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Curso</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="c-nombre">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button id="f-crear" type="button" class="btn btn-primary">Crear</button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Modal Modificar -->
      <div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Curso</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="m-nombre">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button id="f-modificar" type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Modal Eliminar -->
      <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Curso</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    ¿Realmente desea eliminar el curso <span id="e-nombre"></span>?
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button id="f-eliminar" type="button" class="btn btn-primary">Eliminar</button>
            </div>
          </div>
        </div>
      </div>