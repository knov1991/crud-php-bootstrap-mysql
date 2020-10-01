<?php 
/*
  Author : Lucas Ferreira
  Email : lucasf1991@hotmail.com
  Repo : https://github.com/knov1991/crud-php-bootstrap-mysql
*/
?>
<?php include_once 'database.php'; ?>
<?php include_once 'header.php'; ?>

<div class="container">
    <!--Link para Pagina de Adicionar usuário-->
    <a href="add-data.php" class="btn btn-large btn-info">
        <i class="glyphicon glyphicon-plus"></i> &nbsp; Adicionar usuário
    </a>
</div>
<br />
<div class="container"> 
    <!--Criar Tabela de Exibição do Index-->
	<table class='table table-bordered table-responsive'> 
        <tr>
            <th>N°</th>
            <th>Nome </th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th colspan="2" align="center">Actions</th>
        </tr>
        <?php    
		  $crud->dataview("SELECT * FROM usuarios"); // Chamar metodo de exibição.
	    ?>
    </table> 
</div>
<?php include_once 'footer.php'; ?> <!--incluir footer -->