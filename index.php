<?php
$product_name = "";
$product_description="";
$conn = mysqli_connect("localhost", "root", "", "project");

// check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connected";
}

// prepare the SQL statement with placeholders
$stmt = $conn->prepare("INSERT INTO products (product_name, product_price, product_description) VALUES (?, ?, ?)");

// bind the values to the placeholders in the prepared statement
$stmt->bind_param("sds", $product_name, $product_price, $product_desc);

// set the values of the variables
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_description'];

// execute the prepared statement
if ($stmt->execute()) {
    // echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// close the prepared statement and database connection
$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <H1>ABHINANDAN PATTNAIK</H1>
    (ADD DATA IN THE FIRST ROW...)
<form method="post" action="index.php" enctype="multipart/form-data">
<table id="table">
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>PRICE</th>
    <th>DESCRIPTION</th>
    <th>IMAGE</th>
    <th>ACTIONS</th>
  </tr>
  <tr>
    <td><input id="id" type="number" name="id" value="<?php echo $id; ?>"></td>
    <td><input type="text" name="product_name" value="<?php echo $product_name; ?>" id="product_name"></td>
    <td><input type="number" name="product_price" value="<?php echo $product_price; ?>" id="product_price" required></td>
    <td><textarea name="product_description" id="product_description" required><?php echo $product_description; ?></textarea></td>
    <td><input type="file" name="product_images[]" multiple></td>
    <td><button type="edit" name="edit" id="edit" ><img src="images/edit.jpeg" alt="edit"></button>
        <button type="delete" name="delete" id="delete" onclick="return deleteRow()"><img src="images/R.png" alt="delete"></button></td>
  </tr>
  <tbody id="tbody"></tbody>
</table>
(CLICK SAVE PRODUCT TO SAVE YOUR DATA)
  <button type="submit" onclick="return addItem()" name="submit" id="submit">Save Product</button>
</form>
<script>
    function addItem() {
        event.preventDefault();
  var id = document.getElementById("id").value;
  var product_name = document.getElementById("product_name").value;
  var product_price = document.getElementById("product_price").value;
  var product_description = document.getElementById("product_description").value;
  var html = "<tr>";
  html += "<td>" + id + "</td>";
  html += "<td>" + product_name + "</td>";
  html += "<td>" + product_price + "</td>";
  html += "<td>" + product_description + "</td>";
  html += "<td>image added</td>";
  html += '<td><button type="edit" name="edit" id="edit"><img src="images/edit.jpeg" alt="edit"></button><button type="delete" name="delete" id="delete" onclick="return deleteRow(this)"><img src="images/R.png" alt="delete"></button></td>';
  html += "</tr>";
  var row = document.getElementById('tbody').insertRow();
  row.innerHTML = html;
    }
 
    function deleteRow(button) {
  // Find the closest <tr> element
  var row = button.closest("tr");
  
  // Remove the row from the table
  row.remove();
}
</script>






</body>
</html>


