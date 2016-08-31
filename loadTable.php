<?php
$host = "localhost";
$port = "3308";
$user = "root";
$password = "1234";
$database = "mydb";

$conn = new mysqli($host, $user, $password, $database, $port, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
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
        
        function hover(){
            alert("in");
        }</script>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td> <?php echo 'No results'; ?> </td>
                <td> <?php echo 'No results'; ?> </td>
                <td> <?php echo 'No results'; ?> </td>
                <td> <?php echo 'No results'; ?> </td>
                <td> <?php echo 'No results'; ?> </td>
                <td> <?php echo 'No results'; ?> </td>
                <td></td>
            </tr>
        <?php } ?>
    </tbody>
</table>