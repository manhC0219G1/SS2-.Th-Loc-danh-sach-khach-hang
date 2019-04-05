<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method = "post">
    <fieldset>
        From:<input type ="date" name = "from" placeholder="yyyy-mm-dd">
        To :<input type="date" name="to"placeholder="yyyy-mm-dd">
        <input type="submit" id ="submit" value = "Search"><br><br>
        <h2> Customer List</h2>
    </fieldset>
</form>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 5px solid green;
    }
</style>
</body>
<table border="4">
    <caption><h1>Danh sách khách hàng</h1></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>
    <?php
    $customerlist = array(
        "1" => array("ten" => "Vũ Thị Phương",
            "ngaysinh" => "1995-01-20",
            "diachi" => "Hà Nội",
            "anh" => "anh4.jpeg"),
        "2" => array("ten" => "Phạm Thị Hoa",
            "ngaysinh" => "1990-08-20",
            "diachi" => "Bắc Giang",
            "anh" => "anh 5.jpeg"),
        "3" => array("ten" => "Nguyễn Ngọc Anh",
            "ngaysinh" => "1992-08-21",
            "diachi" => "Nam Định",
            "anh" => "anh 3.jpeg")
    );

    $from_date=$_POST["from"];
    $to_date=$_POST["to"];


    function searchByDate($customerlist, $from_date, $to_date) {
        $filtered_customers = [];

        if(empty($from_date) && empty($to_date)){
            return $customerlist;
        }

        foreach($customerlist as $customer){
            if(!empty($from_date) && (strtotime($customer['ngaysinh']) < strtotime($from_date)))
                continue;
            if(!empty($to_date) && (strtotime($customer['ngaysinh']) > strtotime($to_date)))
                continue;
            $filtered_customers[] = $customer;
        }
        return $filtered_customers;
    }
    $filtered_customers = searchByDate($customerlist,$from_date,$to_date);
    ?>
    <?php
    foreach($filtered_customers as $key => $values){
        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$values['ten']."</td>";
        echo "<td>".$values['ngaysinh']."</td>";
        echo "<td>".$values['diachi']."</td>";
        echo "<td><image src ='".$values['anh']."' width = '80px' height ='80px'/></td>";
        echo "</tr>";
    }
    ?>
    <?php

    ?>

</table>
</html>
