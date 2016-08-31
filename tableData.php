<?php
$value = $_REQUEST["value"];
$search = $_REQUEST["search"];

$host = "localhost";
$port = "3308";
$user = "root";
$password = "1234";
$database = "mydb";

$conn = new mysqli($host, $user, $password, $database, $port, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($value == 1) {
    $sql = "SELECT * FROM products WHERE name like '%$search%' ";
} else if ($value == 2) {
    $sql = "SELECT * FROM products WHERE colour = '$search' ";
} else if ($value == 3) {
    $sql = "SELECT * FROM products WHERE size = $search ";
} else if ($value == 4) {
    if($search == 1){
        $sql = "SELECT * FROM products WHERE unit_price between 0 AND 1000 ";
    } else if($search == 2){
        $sql = "SELECT * FROM products WHERE unit_price between 1000 AND 2000 ";
    } else if($search == 3){
        $sql = "SELECT * FROM products WHERE unit_price between 2000 AND 3000 ";
    } else if($search == 4){
        $sql = "SELECT * FROM products WHERE unit_price between 3000 AND 4000 ";
    } else if($search == 5){
        $sql = "SELECT * FROM products WHERE unit_price between 5000 AND 10000 ";
    } else {
        $sql = "SELECT * FROM products";
    }
} else if ($value == 5) {
    $sql = "SELECT * FROM products WHERE product_type_idproduct_type = $search ";
} else {
    $sql = "SELECT * FROM products";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?> 
    <table>
        <thead>
            <tr>
                <th style="width: 15%">Product Name</th>
                <th style="width: 15%">Colour</th>
                <th style="width: 10%">Size</th>
                <th style="width: 15%">Material</th>
                <th style="width: 20%">Occasion</th>
                <th style="width: 15%">Price (Rs:)</th>
                <th style="width: 10%">Delete / Update</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td> <?php echo $row["name"]; ?> </td>
                    <td> <?php echo $row["colour"]; ?> </td>
                    <td> <?php echo $row["size"]; ?> </td>
                    <td> <?php echo $row["occassion"]; ?> </td>
                    <td> <?php echo $row["material"]; ?> </td>
                    <td> <?php echo $row["unit_price"]; ?> </td>
                    <td><a onmouseover="hover(1)"><img id="deletei" src="imgs/update.png" alt="Update" /></a><a onmouseover="hover(2)" style="padding-left: 40px;"><img id="updatei" src="imgs/delete.png" alt="Delete"/></a></td>
            <script type="text/javascript">

                function hover() {
                    alert("in");
                }</script>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="7" style="text-align: center;"> <?php echo 'No results'; ?> </td>
    </tr>
<?php } ?>
</tbody>
</table>