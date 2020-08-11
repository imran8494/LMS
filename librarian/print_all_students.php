<?php

require_once '../conn.php';

$result = mysqli_query($conn,"SELECT * FROM `students`");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print All Students</title>
    <style type="text/css">
        body {
            margin: 0;
            font-family: kalpurush;
        }

        .print-area {
            width: 794px;
            height: 1123px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }

        .header,
        .page-info {
            text-align: center;
        }

        .data-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-info th,
        .data-info td {
            border: 1px solid black;
            padding: 4px;
            line-height: 1em;
        }
    </style>
</head>

<body onload="window.print()">
<?php

$sl = 1;
$page = 1;
$total = mysqli_num_rows($result);
$per_page = 30;

while($row = mysqli_fetch_assoc($result)){
    if($sl % $per_page == 1){
        echo page_header();
    }
    ?>
    
    
    <tr>
        <td><?=$sl;?></td>
        <td><?=ucwords($row['fname'].' '.$row['lname']);?></td>
        <td><?=$row['roll'];?></td>
        <td><?=$row['reg'];?></td>
        <td><?=$row['email'];?></td>
        <td><?=$row['username'];?></td>
        <td><?=$row['phone'];?></td>
        <td><?=$row['status'] == 1 ? 'Active': 'Inactive';?></td>
    </tr>
    
    <?php
    if($sl % $per_page == 0 || $total == $per_page){
        echo page_footer($page++);
    }
    $sl++;
}
?>
</body>

</html>

<?php

function page_header()
{
    $data = '
    <div class="print-area">
        <div class="header">
            <h1>Md. Imran Hossain</h1>
            <h1>মোঃ ইমরান হোসেন</h1>
        </div>
        <div class="data-info">
            <table>
                <tr>
                    <th>Sl no.</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Reg.</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
                
    ';
    return $data;
}

function page_footer($page)
{
    $data = '
    
    </table>
    <div class="page-info">Page :- '.$page.'</div>
</div>
</div>
    ';
    return $data;
}

?>