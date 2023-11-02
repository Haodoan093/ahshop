<?php
  $sql_bv="SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_baiviet='$_GET[idbaiviet]' LIMIT 1";
  $query_bv=mysqli_query($mysqli,$sql_bv);


  $query_bv_all=mysqli_query($mysqli,$sql_bv);
   $row_bv_title = mysqli_fetch_array($query_bv);
 
 
?>

<style>
  /* Style for the article title */
  h3 {
    color: #333; /* Text color */
  }

  /* Style for the list of articles */
  ul.baiviet {
    list-style-type: none; /* Remove list bullets */
    padding: 0; /* Remove default padding */
  }

  /* Style for each individual article */
  ul.baiviet li {
    margin-bottom: 20px;
    margin-left: 50px;
    border: 1px solid #ccc;
    padding: 146px;
    padding-top: 10px;
    padding-left: 176px;
    width: 95%;
    background-color: #f9f9f9;
  }

  /* Style for the article title inside each article */
  ul.baiviet li h4 {
    font-size: 1.2em; /* Increase font size */
    color: #444; /* Text color for titles */
  }

  /* Style for the article image */
  ul.baiviet li img {
    max-width: 100%; /* Make sure images don't exceed their container */
    height: auto; /* Maintain aspect ratio of images */
  }

  /* Style for the article summary */
  ul.baiviet li .tomtatbaiviet {
    color: #666; /* Text color for summary */
  }

  /* Style for the article content */
  ul.baiviet li .noidungbaiviet {
    margin-top: 10px; /* Add spacing between summary and content */
    color: #333; /* Text color for content */
  }
</style>

<h3>Bài viết : <?php  echo $row_bv_title['tenbaiviet']?></h3>
              <ul class="baiviet">
                 
              <?php while ($row_bv = mysqli_fetch_array($query_bv_all)) {
               ?>
                  <li> 
                     <!-- <h4><?php echo $row_bv['tenbaiviet']?></h4> -->
                    
                       <p class ="noidungbaiviet"><?php echo $row_bv['noidung']?></p>
              
                  </li>

               <?php }
               ?>
                
              </ul>
              