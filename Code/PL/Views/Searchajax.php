
<?php
include('../../BLL/userManager.php');

// array("Daniel","Dennis","Danny","Jane","Janna");
    if(isset($_POST['suggestion'])){
        $result =ShowallFilght();
        
        $name = $_POST['suggestion'];?>
        <table class="table table-condensed">
        <?php
        if(!empty($name)){
            $count=1;
            while($row = mysqli_fetch_array($result)){
            
                if((strpos($row['City'],$name)!==false)||(strpos($row['Country'],$name)!==false)){
                   $IDFlight = $row['IDFlight'];
                      $DepartureDate = $row['DepartureDate'];
                      $ReturnDate = $row['ReturnDate'];
                      $Price  = $row['Price'];
                      $Class = $row['Class'];
                      $image = $row['Image'] ;
                      $City = $row['City'];
                      $Country=$row['Country'];

                      ?>
                      <tbody >
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $row['Country']; ?></td>
                          <td><?php echo $row['City']; ?></td>
                          <td><?php echo $row['DepartureDate']; ?></td>
                          <td><?php echo $row['ReturnDate']; ?></td>
                          <td><?php echo $row['Price']; ?>$</td>
                          <td><?php echo $row['Class']; ?></td>
                          <td><img src=<?php echo $row['Image']; ?>  class="img-rounded" alt="Cinque Terre" width="100" height="130" > </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><a href='DeletFlight.php?Delet=<?php echo $row['IDFlight'] ;?>' class="text-danger">Delete</a></td>
                          <td><a href='UpdatePage.php?Update=<?php echo $row['IDFlight'] ;?>'>Update</a></td>
                        </tr>
                        <?php
                        $count=$count+1;
                }
            }
        }
    }


?>