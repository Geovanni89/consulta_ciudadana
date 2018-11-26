<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">                            
                            <form id="form_comentarios" class="form-horizontal">                                
                                <div class="card-body">
                                    <h4 class="card-title">Moderación de comentarios</h4>                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Sector</label>
                                                <select class="form-control" id="iIdSector" name="iIdSector" onchange="carga_temas(this.value);">
                                                    <option value="">Sector</option>
                                                    <?php 
                                                    if($sectores!=false) 
                                                    {
                                                        foreach ($sectores as $vsec) {
                                                            echo '<option value="'.$vsec->iIdSector.'">'.$vsec->vSector.'</option>';
                                                        }
                                                    }
                                                    ?>                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tema</label>
                                                <select class="form-control" id="iIdTema" name="iIdTema" onchange="carga_propuestas(this.value)">
                                                    <option value="">Temas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Propuestas</label>
                                                <select class="form-control" id="iIdPropuesta" name="iIdPropuesta">
                                                    <option value="">Propuesta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Rol</label>
                                                <select name="iEstatus" id="iEstatus" class="form-control">
                                                    <option value="">Estatus</option>
                                                    <option value="0">Eliminado</option>
                                                    <option value="1">Pendiente</option>
                                                    <option value="2">Aprobado</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right">
                                        <!--<button type="submit" class="btn btn-info waves-effect waves-light"><i class="ti-search"></i> Buscar</button>-->
                                        <button type="button" class="btn btn-info waves-effect waves-light" onclick="carga_comentarios();"><i class="ti-search"></i> Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <div class="row" id="contenido_comentarios"></div>
            </div>