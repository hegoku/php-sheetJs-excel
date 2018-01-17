<?php
$data=[];

for ($i=1;$i<=5;$i++) { //随机生成数据
    $tmp=[
        'id'=>($_GET['page']-1)*100+$i,
        'name'=>chr(mt_rand(33, 126)).chr(mt_rand(33, 59)).chr(mt_rand(33, 126)).chr(mt_rand(33, 126)) //生成随机名字
    ];
    array_push($data, $tmp);
}

sleep(2); //模拟数据库耗时

echo json_encode([
    'code'=>200,
    'pagination'=>['count'=>1000],
    'data'=>$data
]);