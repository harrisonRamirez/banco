<div class="panel panel-default">
    <div class="panel-heading">Información</div>
    <div class="panel-body">
      <?php if ($_GET['mod']==1){
        echo 'Permite registrar información del usuario';
      }?>
      <?php if ($_GET['mod']==2){
        echo 'Permite administrar información del usuario';
      }?>
      <?php if ($_GET['mod']==3){
        echo 'Permite administrar nuevos roles';
      }?>
      <?php if ($_GET['mod']==4){
        echo 'Permite administrar los accesos';
      }?>
    </div>
</div>
