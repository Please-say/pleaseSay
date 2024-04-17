<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>끝말잇기 순위</title>
    
    <link rel=stylesheet href="../css/style.css">
    <link rel="stylesheet" href="../css/ranking.css">
</head>
<body>


<h1>끝말잇기 순위</h1>
<br>
<table class="table">

<?php
// 디비접속
include_once("./db_conn.php");
$sql = "SELECT * FROM login_form ORDER BY game2 DESC";

$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

// echo "<thead><tr><th>ID</th><th>게임1</th></thead>";
echo "<tbody>";

// 결과를 반복하여 테이블 행에 표시
$rank = 1;
for ($i = 0; $i < $num; $i = $i + 1) {
    $re = mysqli_fetch_row($result);
    if ($re[2] !== null) { // $re[2] 값이 null이 아닌 경우에만 출력
        echo "<tr><td class='rank'>".$rank."</td><td>".$re[0]."</td><td>".$re[2]."</td></tr>";
        $rank++;
    }
}

echo "</tbody></table>";
mysqli_close($conn);

?>

</table>

<div class="button-container" onClick="location.href='login.html'">
    돌아가기
</div>

</body>
</html>