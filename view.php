<?php
include ("connect.php");
?>
<table border='1'>
    <tr>
        <th>
            Name
        </th>
        <th>
            Username
        </th>
        <th>
            Profile_file
        </th>
    </tr>

    <?php
        $query= $db->query("SELECT * from register ORDER BY uploaded_on DESC");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $imageURL = 'register/'.$row["Profile_file"];
    ?>

    <tr>
        <td>
            <?php echo $row['FirstName']?>
        </td>
        <td>
            <?php echo $row['UserName']?>
        </td>
        <td>
            <img src="<?php echo $imageURL; ?>" alt="" width="100px" height="100px"/>
        </td>
    </tr>

    <?php   } 
        }else{ ?>
            <p>No data found...</p>
    <?php    } ?>