<?php 
if($url=='/include/index.php'){
    include "components/bodyPagina1.php"; 
}elseif($url=='include/pages/pagina2.php'){
    include "../components/bodyPagina2.php"; 
}elseif($url=='/include/pages/pagina3.php'){
    include "../components/bodyPagina3.php"; 
}