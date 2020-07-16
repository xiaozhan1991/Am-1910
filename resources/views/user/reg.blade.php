<!DOCTYPE html>

<html>

<head>

    <meta charset=utf8>

    <title>注册页面</title>

</head>

<body>
<form method="POST" action="{{url('/user/regDo')}}" enctype="multipart/form-data">

    <table>
        @csrf
        <tr>

            <td>用户名：</td><td><input type="text" name="reg_name"></td>

        </tr>
        <tr>

            <td>用户Email：</td><td><input type="email" name="reg_email"></td>

        </tr>
        <tr>

            <td>密码：</td><td><input type="password" name="reg_pwd"></td>

        </tr>
        <tr>

            <td>确认密码：</td><td><input type="password" name="reg_pwds"></td>

        </tr>
        <tr>

            <td><input type="submit" value="注册"></td>

        </tr>

    </table>

</form>

</body>

</html>

