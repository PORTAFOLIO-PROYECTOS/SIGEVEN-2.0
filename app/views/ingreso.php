<?php
//Activamos el alamacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
}else{

require 'header.php';

if ($_SESSION["compras"] == 1) {

?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Compras
      </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">
                            Ingreso
                            <button id="btnAgregar" class="btn btn-success" onclick="mostrarForm(true)"><i class="fa fa-plus-circle"></i> Agregar</button>
                        </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                    <div class="panel-body table-responsive" id="listadoRegistros">
                        <table id="tblListado" class="table table-hover table-bordered table-condensed table-striped">
                            <thead>
                                <th>Opciones</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Usuario</th>
                                <th>Documento</th>
                                <th>Número</th>
                                <th>Total Compra</th>
                                <th>Estado</th>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <th>Opciones</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Usuario</th>
                                <th>Documento</th>
                                <th>Número</th>
                                <th>Total Compra</th>
                                <th>Estado</th>
                            </tfoot>
                        </table>
                    </div>

                    <div class="panel-body" id="formularioRegistros">
                        <form name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <label>Proveedor(*):</label>
                                <input type="hidden" name="idingreso" id="idingreso">
                                <select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true" required></select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Fecha(*):</label>
                                <input type="date" class="form-control" name="fecha_hora" id="fecha_hora" autocomplete="off" required>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Tipo Comprobante(*):</label>
                                <select name="tipo_comprobante" id="tipo_comprobante" class="form-control selectpicker" required>
                                    <option value="Boleta">Boleta</option>
                                    <option value="Factura">Factura</option>
                                    <option value="Ticket">Ticket</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <label>Serie(*):</label>
                                <input type="date" class="form-control" name="serie_comprobante" id="serie_comprobante" autocomplete="off" required maxlength="7" placeholder="Serie">
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <label>Número(*):</label>
                                <input type="date" class="form-control" name="num_comprobante" id="num_comprobante" autocomplete="off" required maxlength="10" placeholder="Número">
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <label>Impuesto(*):</label>
                                <input type="date" class="form-control" name="impuesto" id="impuesto" autocomplete="off" required maxlength="10" placeholder="Impuesto">
                            </div>

                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a data-toggle="modal" href="#myModal">
                                    <button type="button" id="btnAgregaArt" class="btn btn-primary">
                                        <span class="fa fa-plus"></span> Agregar Artículos
                                    </button>
                                </a>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                    <thead style="background-color: #A9D0F5">
                                        <th>Opciones</th>
                                        <th>Artículos</th>
                                        <th>Cantidad</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tfoot>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">S/. 0.00</h4><input type="hidden" name="total_compra" id="total_compra"></th>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" id="guardar">
                                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                                <button class="btn btn-danger" onclick="cancelarForm()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
</div>
<?php
}
else{
    require 'noacceso.php';
}
    require 'footer.php';
?>

<script src="scripts/ingreso.js"></script>
<?php
}

ob_end_flush();

?>