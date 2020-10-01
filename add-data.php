<?php
/*
  Author : Lucas Ferreira
  Email : lucasf1991@hotmail.com
  Repo : https://github.com/knov1991/crud-php-bootstrap-mysql
*/

include_once 'database.php';
if(isset($_POST['btn-save'])){
	$fname = $_POST['nome'];
	$lname = $_POST['sobrenome'];
	$email = $_POST['email'];
	$contact = $_POST['telefone'];
	if($crud->create($fname,$lname,$email,$contact)){
        header("Location: add-data.php?inserted");
    }else{
		header("Location: add-data.php?failure");
	}}
?>
<?php include_once 'header.php'; ?>
<?php
if(isset($_GET['inserted'])){
	?>
    <div class="container">
	   <div class="alert alert-info">
        Usuário cadastrado com sucesso
	   </div>
	</div>
    <?php
}else if(isset($_GET['failure'])){
	?>
    <div class="container">
	   <div class="alert alert-warning">
        Erro ao cadastrar
	   </div>
	</div>
    <?php
    }
?>

<div class="container">
	<form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Nome</td><td><input type='text' name='nome' class='form-control' required></td>
        </tr>
        <tr>
            <td>Sobrenome</td><td><input type='text' name='sobrenome' class='form-control' required></td>
        </tr>
        <tr>
            <td>E-mail</td><td><input type='text' name='email' class='form-control' required></td>
        </tr>
        <tr>
            <td>Telefone</td><td><input type='text' name='telefone' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
            <!--btn-save : botão de confirmação-->
            <button type="submit" class="btn btn-primary" name="btn-save">
    		<span class="glyphicon glyphicon-plus"></span> Criar usuário</button>
            <!--retornar a pagina index-->  
            <a href="index.php" class="btn btn-large btn-success" style="float: right;">
            <i class="glyphicon glyphicon-backward"></i> &nbsp; Retornar</a>
            </td>
        </tr>
    </table><!--fim da tabela-->
</form><!--fim do form-->
</div>
<?php include_once 'footer.php'; ?>