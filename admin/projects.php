<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM projects
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Project has been deleted' );
  
  header( 'Location: projects.php' );
  die();
  
}

$query = 'SELECT *
  FROM projects
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Projects</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="left">Content</th>
    <th align="center">URL</th>
    <th align="center">Date</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['title'] ); ?>
        <small><?php echo $record['content']; ?></small>
      </td>
      <td align="center"><?php echo $record['url']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['date'] ); ?></td>
      <td align="center"><a href="projects_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="projects.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="projects_add.php"><i class="fas fa-plus-square"></i> Add Project</a></p>


<?php

include( 'includes/footer.php' );

?>