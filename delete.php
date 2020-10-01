<?php
/*
  Author : Lucas Ferreira
  Email : lucasf1991@hotmail.com
  Repo : https://github.com/knov1991/crud-php-bootstrap-mysql
*/

include_once 'database.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: delete.php?deleted");	
}

?>
<?php include_once 'header.php'; ?>

<div class="container">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	Usuário removido com sucesso
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
        Remover usuário
		</div>
        <?php
	}
	?>	
</div>

<div class="container">
 	
	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
         <th>N°</th>
         <th>Nome</th>
         <th>Sobrenome</th>
         <th>E-mail</th>
         <th>Telefone</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM usuarios WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['id']); ?></td>
             <td><?php print($row['nome']); ?></td>
             <td><?php print($row['sobrenome']); ?></td>
             <td><?php print($row['email']); ?></td>
         	 <td><?php print($row['telefone']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; Remover</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Retornar</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index.php" class="btn btn-large btn-success" style="float: right;><i class="glyphicon glyphicon-backward"></i> &nbsp; Retornar ao index</a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>