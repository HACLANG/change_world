<?php
//conn db
try{
    $pdo = new PDO("mysql:host=localhost; dbname=school_m;","root","");
}catch(PDOException $exception){
    die("数据库连接失败".$exception -> getMessage());
}
//通过action的值做应答
switch ($_GET['action']){
    case "add":
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $spec = $_POST['spec'];
        $classid = $_POST['classid'];

        $sql = "INSERT INTO `class` (`id`, `name`, `sex`, `spec`, `classid`) VALUES (' $id ', ' $name ', ' $sex ', ' $spec ', ' $classid ');";
        //exec();执行一条sql语句，并返回执行结果，exec()方法不能用于select查询。
        $rw = $pdo->exec($sql);
        if ( $rw > 0 ){
            echo "<script>alert('添加成功');window.location='index.php'</script>";
        }else{
            echo "<script>alert('添加失败');window.history.back();</script>";
        }
        break;
    case "del":
        $id = $_GET['id'];
        $sql = " DELETE FROM `class` WHERE id='$id' ";
        $de = $pdo->exec($sql);
//        if ( $de > 0 ){
//            echo "<script>alert('删除成功');window.history.back();</script>";
//        }else{
//            echo "<script>alert('删除失败');window.history.back();</script>";
//        }
//        break;
//        $pdo = exec($sql);
        header("Location:index.php");
        break;

    case "edit":
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $spec = $_POST['spec'];
        $classid = $_POST['classid'];

        echo "$name.+$sex.+$spec.+$classid";

        $sql = "UPDATE class SET name='{$name}', sex='{$sex}', `spec`='{$spec}', `classid`='{$classid}' WHERE id=$id ";
        $rw = $pdo->exec($sql);
        if ( $rw > 0 ){
            echo "<script>alert('修改成功');window.location='index.php'</script>";
            echo "修改成功";
        }else{
            echo "<script>alert('修改失败');window.history.back();</script>";
            echo "修改失败";
        }
        break;
}

