<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM skills
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Skill has been deleted' );
  
  header( 'Location: skills.php' );
  die();
  
}

$query = 'SELECT *
  FROM skills
  ORDER BY name DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Skills</h2>

<p><a href="skills_add.php"><i class="fas fa-plus-square"></i> Add Skill</a></p>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Name</th>
    <th align="center">Type</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['name']; ?></td>
      <td align="center"><?php echo $record['type']; ?></td>
      <td align="center"><a href="skills_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="skills.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this skill?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<?php

include( 'includes/footer.php' );

?>