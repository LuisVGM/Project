<?php 

	$inactividad = 600; //300 segundos - 5 min

	//comprobar que timeout exista
	if(isset($_SESSION['timeout'])){
    $tiempoInactivo= time() - $_SESSION['timeout'];
        if($tiempoInactivo>$inactividad){
        	echo '<div class="modal fade" tab-index="-1" id="inactividad">

                  <div class="modal-dialog modal-sm modal-dialog-centered">

                    <div class="modal-content">

                      <div class="modal-header">

                        <center><h4>Se cerro tu sesión por inactividad</h4></center>

                      </div>

                    <div class="modal-footer">

                    <a class="btn btn-lg btn-danger btn-block text-white" href="sesion.php">Volver a iniciar</a>

                  </div>

                </div>

              </div> 

            </div>';
            //header("location: sesion.php");
        }
    }
    $_SESSION['timeout']=time();
?>
