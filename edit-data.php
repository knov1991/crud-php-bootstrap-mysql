<?php
/*
  Author : Lucas Ferreira
  Email : lucasf1991@hotmail.com
  Repo : https://github.com/knov1991/crud-php-bootstrap-mysql
*/

include_once 'database.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$fname = $_POST['nome'];
	$lname = $_POST['sobrenome'];
	$email = $_POST['email'];
	$contact = $_POST['telefone'];
	
	if($crud->update($id,$fname,$lname,$email,$contact))
	{
		$msg = "<div class='alert alert-info'>
				Usuário editado com sucesso
                </div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				Erro ao editar usuário
                </div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}
?>

<?php include_once 'header.php'; ?>
<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>
<div class="container">	 
    <form method='post'>
    <table class='table table-bordered'>
        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' class='form-control' value="<?php echo $nome; ?>" required></td>
        </tr>
 
        <tr>
            <td>Sobrenome</td>
            <td><input type='text' name='sobrenome' class='form-control' value="<?php echo $sobrenome; ?>" required></td>
        </tr>
 
        <tr>
            <td>E-mail</td>
            <td><input type='text' name='email' class='form-control' value="<?php echo $email; ?>" required></td>
        </tr>
 
        <tr>
            <td>Telefone</td>
            <td><input type='text' name='telefone' class='form-control' value="<?php echo $telefone; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Editar usuário
				</button>
                <a href="index.php" class="btn btn-large btn-success" style="float: right;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Retornar</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php include_once 'footer.php'; ?>