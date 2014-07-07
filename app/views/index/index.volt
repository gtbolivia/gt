<!--BEGIN MENU IZQUIERDO-->
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm gt-sideLeft">
    <a class="navmenu-brand visible-md visible-lg margin0 bgWhite" href="#">
        <img src="images/logo-gt.png" alt="" />
    </a>
    <div class="container gt-sideLeft">
        <form class="navbar-form" role="form">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar proyecto.">
                <span class="input-group-addon">Buscar</span>
            </div>
            <br/><br/>
        </form>
    </div>
    <div class="container gt-sideLeft">
        <ul class="nav navmenu-nav">
            <li class=""><label class="tree-toggler">ADMINISTRACION CENTRAL</label>
                <ul class="nav navmenu-nav tree">
                    <li class="active"><a href="#"><span class="badge badge-success pull-right">2%</span> Ministerios</a></li>
                    <li><a href="#"><span class="badge badge-success pull-right">90%</span> Entidades Descentralizadas</a></li>
                    <li><a href="#"><span class="badge badge-success pull-right">90%</span> Empresas nacionales</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li><label class="tree-toggler">COFINANCIAMIENTO REGIONAL</label>
                <ul class="nav navmenu-nav tree">
                    <li><a href="#"><span class="badge badge-success pull-right">90%</span> Fondos de Inversion</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li><label class="tree-toggler">ADMINISTRACION DEPARTAMENTAL</label>
                <ul class="nav navmenu-nav tree">
                    <li><a href="#"><span class="badge badge-success pull-right">2%</span> Gobernaturas - GAD</a></li>
                    <li><a href="#"><span class="badge badge-success pull-right">90%</span> Empresas Regionales</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li><label class="tree-toggler">ADMINISTRACION LOCAL</label>
                <ul class="nav navmenu-nav tree">
                    <li><a href="#"><span class="badge badge-success pull-right">2%</span> Empresas Locales</a></li>
                    <li><a href="#"><span class="badge badge-success pull-right">90%</span> Universidades</a></li>
                    <li><a href="#"><span class="badge badge-success pull-right">90%</span> Municipios Grandes</a></li>
                    <li><a href="#"><span class="badge badge-success pull-right">2%</span> Municipios Peque&ntilde;os</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--END MENU IZQUIERDO-->



<div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Project name</a>
</div>

<div class="container-fluid gt-menuTop">
    <div class="navbar-header">
        <ul class="nav pull-left">
            <li class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-gestion"></i><strong>Gestion 2014</strong><i class="caret"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a tabindex="-1" href="#">Gesti&oacute;n 2013</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a tabindex="-1" href="login.html">Gesti&oacute;n 2012</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav pull-right">
            <li class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Milton Loayza <i class="caret"></i></a>
                <ul class="dropdown-menu">
                    <li>
                        <a tabindex="-1" href="#">Configuracion</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a tabindex="-1" href="login.html">Salir</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>


<!--BEGIN CUERPO DE LA PAGINA-->
<!--<div class="container-fluid">-->
<!--<div class="row">-->

<!--</div>-->
<!--</div>-->
<div class="jumbotron margin0 areaInformation">
    <div class="container">
        <div class="col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <div class="porcentajeTranstarencia"></div>
        </div>
        <div class="col-md-7 col-md-offset-1 col-sm-8 col-xs-12">
            <h2>INDICE DE TRANSPARENCIA<br/>DE INVERSION PUBLICA</h2>
            <p>Este indice se calcula a partir de la inversion publica mediante la siguiente ecuacion:</p>
            <div class="jumbotron formulaTransparencia">
                <div class="valorFormula">
                    <span>Total de proyectos registrados</span>
                    <span class="lineaFormula"></span>
                    <span>Inversion Publica total</span>
                </div>
                <div class="lineaPorcentage">%</div>
                <div class="clearfix"></div>
            </div>
            <!--<p><a class="btn btn-primary btn-lg" role="button">Learn more »</a></p>-->
        </div>
        <!--<div class="clearfix" />-->
        <!--<div class="col-md-6 col-md-offset-4">-->
        <!--<div class="jumbotron">-->
        <!--Total de proyectos registrados-->
        <!--</div>-->
        <!--</div>-->
    </div>
</div>
<div class="jumbotron bgWhite areaAgregarProyecto fontImportant">
    <div class="col-md-12">
        Para subir este indice es necesario: <button type="button" class="btn btn-lg btn-success">Agregar Proyecto <span class="glyphicon glyphicon-plus"></span></button>
    </div>
</div>
<div class="container  fontImportant">
    <div class="row">
        <div class="col-lg-5 col-lg-offset-1"><span class="glyphicon glyphicon-plus"></span> Salud y seguridad Social</div>
        <div class="col-lg-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                    20%
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-lg-offset-1"><span class="glyphicon glyphicon-plus"></span> Educacion y Cultura</div>
        <div class="col-lg-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                    30%
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-lg-offset-1"><span class="glyphicon glyphicon-plus"></span> Saneamiento Basico</div>
        <div class="col-lg-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                    30%
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-lg-offset-1"><span class="glyphicon glyphicon-plus"></span> Urbanismo y Vivienda</div>
        <div class="col-lg-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                    20%
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="container-fluid">-->
<!--<div class="row">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group">-->
<!--<label for="">Nombre de Proyecto</label>-->
<!--<input type="text" class="form-control" id="" placeholder="">-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-md-6">-->
<!--<div class="form-group has-feedback">-->
<!--<label  class="control-label" for="frmLocalizacion">Localizacion</label>-->
<!--<input type="text" class="form-control" id="frmLocalizacion" placeholder="">-->
<!--<span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group">-->
<!--<label for="">Entidad Financiera</label>-->
<!--<select class="form-control">-->
<!--<option value="">Seleccionar Entidad financiera</option>-->
<!--<option value="">Ninguno</option>-->
<!--</select>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-md-6">-->
<!--<div class="form-group">-->
<!--<label for="">Tipo de Proyecto</label>-->
<!--<select class="form-control">-->
<!--<option value="">Seleccionar Tipo de Proyecto</option>-->
<!--<option value="">Ninguno</option>-->
<!--</select>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-md-6">-->
<!--<div class="form-group">-->
<!--<label for="">Periodo de Realizacion</label>-->
<!--<input type="email" class="form-control" id="" placeholder="">-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-md-6">-->
<!--<div class="form-group">-->
<!--<label for="">Inversion</label>-->
<!--<input type="email" class="form-control" id="" placeholder="">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-md-12">-->
<!--<div class="form-group">-->
<!--<label for="">Descripcion del Proyecto</label>-->
<!--<textarea class="form-control" rows="3"></textarea>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-md-12">-->
<!--<div class="form-group">-->
<!--<label for="">Impacto Social</label>-->
<!--<textarea class="form-control" rows="3"></textarea>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-md-12">-->
<!--<div class="form-group text-right">-->
<!--<button type="button" class="btn btn-lg btn-success">Agregar Proyecto</button>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!-- /.container -->

<!--END CUERPO DE LA PAGINA-->

