<html>
<head>
<title>Electricity Bill</title>
<style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;}
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;}
        h2, h3 {
            text-align: center;
            color: blue;}     
        input {
            padding: 8px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;}
        input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;}
        input[type="submit"]:hover {
            background-color: darkblue;}
        .bill {
            margin-top: 20px;
            padding: 15px;
            background-color: #e6f2ff;
            border: 1px solid blue;
            line-height: 1.8;}
        a {
            color: blue;}
 </style>
</head>
<body>
<div class="container">
<h2>Electricity Bill</h2>
<form method="post">
  Name:<input type="text" name="name" required>
  Consumer ID:<input type="text" name="cid" required>
  Units:<input type="number" name="units" min="0" required>
        <input type="submit" name="generate" value="Generate">
    </form>
    <?php
    if(isset($_POST['generate']))
    {
        $name = $_POST['name'];
        $cid = $_POST['cid'];
        $units = $_POST['units'];
        if($units <= 100)
            $energy = $units * 1.5;
        else if($units <= 200)
            $energy = 150 + ($units - 100) * 2.5;
        else if($units <= 300)
          else  $energy = 400 + ($units - 200) * 4;
            $energy = 800 + ($units - 300) * 6;
        $other = 50;
        $payable = $energy + $other;
        $due = date('d-m-Y', strtotime('+15 days'));
        $disconnect = date('d-m-Y', strtotime('+30 days'));
        echo "<div class='bill'>";
        echo "<h3>Bill Details</h3>";
        echo "Name: $name <br>";
        echo "Consumer ID: $cid <br>";
        echo "Units Consumed: $units <br>";
        echo "Energy Charge: Rs.$energy <br>";
        echo "Other Charges: Rs.$other <br>";
        echo "Total Payable: Rs.$payable <br>";
        echo "Due Date: $due <br>";
        echo "Disconnect Date: $disconnect <br><br>";
        echo "<a href='https://wss.kseb.in/' target='_blank'>Pay Online</a>";
        echo "</div>";}
    ?>
</div>
</body>
</html>

