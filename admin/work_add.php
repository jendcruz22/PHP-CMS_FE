<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO work (
        title,
        description,
        location,
        fromDate,
        toDate
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['location'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['fromDate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['toDate'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Work has been added' );
    
  }
  
  header( 'Location: work.php' );
  die();
  
}

?>

<h2>Add Work</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
      
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
  <input type="text" name="location" id="location">
  
  <br>
  
  <label for="fromDate">From Date:</label>
  <input type="date" name="fromDate" id="fromDate">
  
  <br>

  <label for="toDate">To Date:</label>
  <input type="date" name="toDate" id="toDate">
  
  <br>
  
  <input type="submit" value="Add Work">
  
</form>

<p><a href="work.php"><i class="fas fa-arrow-circle-left"></i> Return to Work List</a></p>


<?php

include( 'includes/footer.php' );

?>