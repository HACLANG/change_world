<html>
    <head><title>学生管理信息</title></head>
    <body>
        <center>
            <?php include("menu.php"); ?>
            <h3>添加学生信息</h3>
            <form action="action.php?action=add" method="post">
                <table>
                    <tr>
                        <td>学籍号</td>
                        <td><input type="int" name="id"></td>
                    </tr>
                    <tr>
                        <td>姓名</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>性别</td>
                        <td><input type="radio" name="sex" value="m">man
                            <input type="radio" name="sex" value="w">wuman
                        </td>
                    </tr>
                    <tr>
                        <td>专业</td>
                        <td><input type="text" name="spec"></td>
                    </tr>
                    <tr>
                        <td>班级</td>
                        <td><input type="text" name="classid"></td>
                    </tr>
                    <tr>
                        <td>&nbsp</td>
                        <td><input type="submit" value="添加"></td>
                        <td><input type="reset" value="重置"></td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>