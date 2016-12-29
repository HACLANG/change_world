<html lang="zh-CN">
	<head><title>学生信息管理系统</title></head>
    <script>
        function doDel($id) {
            if (confirm("确定要删除吗？")){
                window.location='action.php?action=del&id='+ $id ;
            }
        }
    </script>
	<body>
		<center>
			<?php include("menu.php");?>
			<h3>浏览学生信息</h3>
			<table width="600" border="1">
			<tr>
				<th>学籍号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>专业</th>
				<th>班级</th>
			</tr>
                <?php
                    //link db
                    try{
                        $pdo = new PDO("mysql:host=localhost; dbname=school_m;","root","");
                        echo "数据库连接成功";
                    }catch(PDOException $exception){
                        die("数据库连接失败".$exception -> getMessage());
                    }
                    //运行sql查询 ，解析&遍历
                    $sql = "select * from class;";
                    $result = $pdo -> query( $sql );
                    foreach ( $result as $row ){
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['sex']}</td>";
                        echo "<td>{$row['spec']}</td>";
                        echo "<td>{$row['classid']}</td>";
                        echo "<td>
                                    <a href='javascript:doDel({$row['id']})'>删除</a>
                                    <a href='edit.php?id={$row['id']}' >修改</a>
                                    <a href='text.php?id={$row['id']}' >{$row['id']}</a>
                               </td>";
                        echo "</tr>";

                    }

                ?>
		</center>
	</body>
</html>