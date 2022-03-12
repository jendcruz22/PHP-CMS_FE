<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Jenny's Portfolio</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!-- FONTS & ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/styles.css">
    
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    
  </head>
  <body>
    <!-- NAVBAR -->
    <div class="w3-top w3-white">
      <div class="w3-bars w3-center w3-large"> <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-text-blue w3-hover-white w3-large" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <h1><a href="#" class="w3-bar-item w3-button w3-hover-white w3-hover-text-blue" sstyle="font-weight: bold;">Jenny Hillary Dcruz</a></h1> </div>
      <div class="w3-bars w3-center w3-large w3-border-bottom"> <a href="mailto:jendcruz23@gmail.com" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-text-blue w3-hover-white w3-border-right">jendcruz23@gmail.com</a> <a class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-border-right">Toronto, Canada</a>
        <a href="https://www.linkedin.com/in/jennydcruz/" class="w3-bar-item w3-button w3-hide-small w3-hover-text-blue w3-hover-white"> <i class="fa fa-linkedin w3-hover-opacity"></i> </a>
        <a href="https://github.com/jendcruz22" class="w3-bar-item w3-button w3-hide-small w3-hover-text-blue w3-hover-white"> <i class="fa fa-github w3-hover-opacity"></i> </a>
        <a href="https://jendcruz23.medium.com/" class="w3-bar-item w3-button w3-hide-small w3-hover-text-blue w3-hover-white"> <i class="fa fa-medium w3-hover-opacity"></i> </a>
      </div>

      <!-- NAVBAR FOR SMALL SCREENS -->
      <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large"> 
        <a href="#objective" class="w3-bar-item w3-button w3-padding-large">Objective</a> 
        <a href="#skills" class="w3-bar-item w3-button w3-padding-large">Skills</a> 
        <a href="#education" class="w3-bar-item w3-button w3-padding-large">Education</a> 
        <a href="#projects" class="w3-bar-item w3-button w3-padding-large">Projects</a> 
        <a href="#work" class="w3-bar-item w3-button w3-padding-large">Work Experience</a> 
      </div>
    </div>

    <!-- OBJECTIVE HEADER -->
    <header id="objective" class="w3-container w3-center" style="padding:158px 36px 30px 36px">
      <h2 class="w3-xlarge">Objective</h2>
      <div class="content">
        <p style="padding: 0px 20px;">An energetic and quick-witted individual with a strong work ethic who is eager to gain practical experience and make use of my interpersonal and technical skills to achieve goals in the field of business, design and development. </p>
      </div>
      <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top w3-hover-text-blue w3-hover-white"><a id="resumeBtn" href="https://jennysresume.netlify.app/assets/CV.pdf">View CV</a></button>
    </header>

    <!-- SKILLS -->
    <div id="skills" class="w3-padding-32 w3-container">
      <h2 class="w3-xlarge w3-center">Skills</h2>
      <div class="w3-content">
        <div class="w3-half">
          <h3 style="font-size: 20px;">Technical skills</h3>
            <?php
              $query = 'SELECT *
                FROM skills
                WHERE type="Technical"';
              $result = mysqli_query( $connect, $query );
            ?>
            <p class="w3-text-grey">
              <ul>
              <?php while($record = mysqli_fetch_assoc($result)): ?>
                  <li>
                    <?php echo $record['name']; ?>
                  </li>
              <?php endwhile; ?>
              </ul>
            </p>
        </div>
        <div class="w3-half">
          <h3 style="font-size: 20px;">Interpersonal skills</h3>
          <?php
            $query = 'SELECT *
              FROM skills
              WHERE type="Soft"';
            $result = mysqli_query( $connect, $query );
          ?>
          <p class="w3-text-grey">
            <ul>
            <?php while($record = mysqli_fetch_assoc($result)): ?>
                <li>
                  <?php echo $record['name']; ?>
                </li>
            <?php endwhile; ?>
            </ul>
          </p>
        </div>
      </div>
    </div>

    <!-- EDUCATION -->
    <div id="education" class="w3-padding-32 w3-container">
      <h2 class="w3-xlarge w3-center">Education</h2>
      <?php
        $query = 'SELECT *
          FROM education';
        $result = mysqli_query( $connect, $query );
      ?>
      <div class="w3-content">
        <table class="w3-table w3-left">
            <?php while($record = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?php echo $record['course']; ?><span class="w3-text-grey"> - <?php echo $record['specialization']; ?>, <?php echo $record['institute']; ?></span></td>
                <td><?php echo date_format(date_create($record['fromDate']), 'd F Y'); ?> - <?php echo date_format(date_create($record['toDate']), 'd F Y'); ?></td>
              </tr>
            <?php endwhile; ?>
        </table>
      </div>
    </div>

    <!-- WORK EXPERIENCE -->
    <div id="work" class="w3-padding-32 w3-container">
      <h2 class="w3-xlarge w3-center">Work Experience</h2>
      <?php
        $query = 'SELECT *
          FROM work
          ORDER BY fromDate DESC';
        $result = mysqli_query( $connect, $query );
      ?>
      <div class="w3-content">
        <table class="w3-table w3-left">
          <?php while($record = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?php echo $record['title']; ?><span class="w3-text-grey"><?php echo $record['description']; ?></span></td>
              <td><?php echo $record['fromDate']; ?>- <?php echo $record['toDate']; ?> | <?php echo $record['location']; ?></td>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>

    <!-- Projects -->
    <div id="work" class="w3-padding-32 w3-container">
      <h2 class="w3-xlarge w3-center">Projects</h2>
      <?php
        $query = 'SELECT *
          FROM projects
          ORDER BY date';
        $result = mysqli_query( $connect, $query );
      ?>
      <div class="publicationCards">
         <div class="w3-row">
          <?php while($record = mysqli_fetch_assoc($result)): ?>
            <div class="w3-col l6 s12">
               <div class="w3-card-4 w3-margin w3-white">
                  <div class="w3-container">
                     <h3>
                        <b><?php echo $record['title']; ?></b>
                     </h3>
                     <h4>
                        <span class="w3-opacity"><?php echo $record['date']; ?></span>
                     </h4>
                  </div>
                  <div class="w3-container">
                     <p><?php echo $record['content']; ?></p>
                     <div class="w3-row">
                        <div class="w3-col m8 s12">
                           <p>
                               <button class="w3-button w3-black w3-padding-large w3-margin-top w3-hover-text-blue w3-hover-white"> 
                                   <a id="resumeBtn" href="<?php echo $record['url']; ?>">Read more »</a>
                                </button>
                            </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          <?php endwhile; ?>
         </div>
    </div>

  </body>
</html>
