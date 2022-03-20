<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <div class="dropup">
                        <a class="btn dropdown-toggle" id="triggerId" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                            <i class="fa fa-life-ring"></i> Ayuda
                        </a>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="#">Preguntas Frecuentes</a>
                            <a class="dropdown-item" href="#">Tutoriales</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="copyright ml-auto d-none d-sm-block">
            {{ Carbon\Carbon::today()->format('Y') }}, Desarrollado por <strong>DVS 360</strong>
        </div>
        <div class="copyright ml-auto text-center d-block d-sm-none">
            - {{ Carbon\Carbon::today()->format('Y') }} -<br>
            <strong></strong>
            <small></small>
        </div>
    </div>
</footer>
