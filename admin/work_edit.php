<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: work.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['description'] )
  {
    
    $query = 'UPDATE work SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      location = "'.mysqli_real_escape_string( $connect, $_POST['location'] ).'",
      fromDate = "'.mysqli_real_escape_string( $connect, $_POST['fromDate'] ).'",
      toDate = "'.mysqli_real_escape_string( $connect, $_POST['toDate'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Work has been updated' );
    
  }

  header( 'Location: work.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM work
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: work.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Work</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="5"><?php echo htmlentities( $record['description'] ); ?></textarea>
  
  <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="location">Location:</label>
  <input type="text" name="location" id="location" value="<?php echo htmlentities( $record['location'] ); ?>">

  <br>
  
  <label for="fromDate">From Date:</label>
  <input type="date" name="fromDate" id="fromDate" value="<?php echo htmlentities( $record['fromDate'] ); ?>">
    
  <br>
  
  <label for="toDate">To Date:</label>
  <input type="date" name="toDate" id="toDate" value="<?php echo htmlentities( $record['toDate'] ); ?>">
    
  <br>
  
  
  <input type="submit" value="Edit Work">
  
</form>

<p><a href="work.php"><i class="fas fa-arrow-circle-left"></i> Return to Work List</a></p>


<?php

include( 'includes/footer.php' );

?>