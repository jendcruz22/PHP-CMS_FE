<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['course'] ) )
{
  
  if( $_POST['course'] and $_POST['specialization'] )
  {
    
    $query = 'INSERT INTO education (
        course,
        specialization,
        institute,
        location,
        fromDate,
        toDate
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['course'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['specialization'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['institute'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['location'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['fromDate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['toDate'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="course">Course:</label>
  <input type="text" name="course" id="course">
    
  <br>
  
  <label for="specialization">Specialization:</label>
  <textarea type="text" name="specialization" id="specialization" rows="10"></textarea>
      
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
  <input type="text" name="institute" id="institute">
  
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
  
  <input type="submit" value="Add Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>