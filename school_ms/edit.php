<html>
<head><title>学生管理信息</title></head>
<body>
<?php  echo   $_GET['id']; ?>
<center>
    <?php include("menu.php");
        echo   $_GET['id'];
    //         if(!empty($id))
    //        {
    //            echo "my".$id;
    //        }else
    //        {
    //            echo 'id is not existed';
    //        }
    //conn db
        try{
            $pdo = new PDO("mysql:host=localhost; dbname=school_m;","root","");
            echo "数据库连接成功";
        }catch(PDOException $exception){
            die("数据库连接失败".$exception -> getMessage());
        }
        //fetch data form db
        $id = $_GET['id'];
        $sql= " SELECT * FROM `class` WHERE id='$id'";
        $que = $pdo->query($sql);
        if( $que->rowCount() >0 ){
            $class = $que->fetch(PDO::FETCH_ASSOC);//解析 data
        }else{
            die("没有修改信息");
            echo "没有修改信息";
        }
    ?>
    <h3>修改学生信息</h3>
    <form action="action.php?action=edit" method="post">
        <table>
            <tr>
                <td>学籍号</td>
                <td><input type="int" name="id" value="<?php echo $class['id'] ?>" ></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" value="<?php echo $class['name'] ?>"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="m"  <?php echo ($class['sex']=="m")? "checked": ""  ?> >man
                    <input type="radio" name="sex" value="w"  <?php echo ($class['sex']=="m")? "checked": ""  ?> >wuman
                </td>
            </tr>
            <tr>
                <td>专业</td>
                <td><input type="text" name="spec" value="<?php echo $class['spec'] ?>" ></td>
            </tr>
            <tr>
                <td>班级</td>
                <td><input type="text" name="classid" value="<?php echo $class['classid'] ?>" ></td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td><input type="submit" value="修改"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>