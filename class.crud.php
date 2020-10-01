<?php
/*
  Author : Lucas Ferreira
  Email : lucasf1991@hotmail.com
  Repo : https://github.com/knov1991/crud-php-bootstrap-mysql
*/

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($fname,$lname,$email,$contact)
	{
		try
		{
			$stmt = $this->db->prepare(
				"INSERT INTO usuarios(nome,sobrenome,email,telefone) 
						VALUES(:fname, :lname, :email, :contact)");
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":contact",$contact);
			return $stmt->execute();
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}	
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$fname,$lname,$email,$contact)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE usuarios SET nome=:fname, sobrenome=:lname, email=:email, telefone=:contact WHERE id=:id ");
			$stmt->bindparam(":fname",$fname);
			$stmt->bindparam(":lname",$lname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":contact",$contact);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM usuarios WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
		
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();	
		if($stmt->rowCount() > 0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                	<td><?php print($row['id']); ?></td>
                	<td><?php print($row['nome']); ?></td>
                	<td><?php print($row['sobrenome']); ?></td>
                	<td><?php print($row['email']); ?></td>
                	<td><?php print($row['telefone']); ?></td>
                	<td align="center">
                	<a href="edit-data.php?edit_id=<?php print($row['id']); ?>">
					<i class="glyphicon glyphicon-edit"></i>
					</a>
                	</td>
                	<td align="center">
                	<a href="delete.php?delete_id=<?php print($row['id']); ?>">
					<i class="glyphicon glyphicon-remove-circle"></i>
					</a>
                	</td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Acune utilisateur...</td>
            </tr>
            <?php
		}
	}	
}
?>