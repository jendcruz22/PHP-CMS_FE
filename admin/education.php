<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM education
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Education has been deleted' );
  
  header( 'Location: education.php' );
  die();
  
}

$query = 'SELECT *
  FROM education';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Educations</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Course</th>
    <th align="center">Specialization</th>
    <th align="center">Institute</th>
    <th align="center">Location</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo htmlentities( $record['course'] ); ?></td>
      <td align="center"><?php echo $record['specialization']; ?></td>
      <td align="center"><?php echo htmlentities( $record['institute'] ); ?></td>
      <td align="center"><?php echo htmlentities( $record['location'] ); ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['fromDate'] ); ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['toDate'] ); ?></td>
      <td align="center"><a href="education_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center"><a href="education.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');">Delete</i></a></td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="education_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>


<?php

include( 'includes/footer.php' );

?>