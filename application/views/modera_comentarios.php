<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">                            
                            <form class="form-horizontal">                                
                                <div class="card-body">
                                    <h4 class="card-title">Moderación de comentarios</h4>                                    
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Sector</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="iIdSector" onchange="carga_temas(this.value);">
                                                <option value="">Seleccione un sector</option>
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
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Tema</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="iIdTema" onchange="carga_propuestas(this.value)">
                                                <option value="">Seleccione un tema</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label">Propuestas</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="iIdPropuesta">
                                                <option value="">Seleccione una propuesta</option>
                                            </select>
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