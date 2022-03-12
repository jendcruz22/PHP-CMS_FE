<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: education.php' );
  die();
  
}

if( isset( $_POST['course'] ) )
{
  
  if( $_POST['course'] and $_POST['specialization'] )
  {
    
    $query = 'UPDATE education SET
      course = "'.mysqli_real_escape_string( $connect, $_POST['course'] ).'",
      specialization = "'.mysqli_real_escape_string( $connect, $_POST['specialization'] ).'",
      institute = "'.mysqli_real_escape_string( $connect, $_POST['institute'] ).'",
      location = "'.mysqli_real_escape_string( $connect, $_POST['location'] ).'",
      fromDate = "'.mysqli_real_escape_string( $connect, $_POST['fromDate'] ).'",
      toDate = "'.mysqli_real_escape_string( $connect, $_POST['toDate'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Work has been updated' );
    
  }

  header( 'Location: education.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM education
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: education.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Work</h2>

<form method="post">
  
  <label for="course">Course:</label>
  <input type="text" name="course" id="course" value="<?php echo htmlentities( $record['course'] ); ?>">
    
  <br>
  
  <label for="specialization">Specialization:</label>
  <textarea type="text" name="specialization" id="specialization" rows="5"><?php echo htmlentities( $record['specialization'] ); ?></textarea>

  <script>

  ClassicEditor
    .create( document.querySelector( '#specialization' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="institute">Institute:</label>
  <input type="text" name="institute" id="institute" value="<?php echo htmlentities( $record['institute'] ); ?>">
    
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

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Work List</a></p>


<?php

include( 'includes/footer.php' );

?>