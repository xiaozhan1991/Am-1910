<!DOCTYPE html>

<html>

<head>

    <meta charset=utf8>

    <title>登录页面</title>

</head>
<body>
<form method="post" action="{{url('user/logDo')}}">

    <table>
    @csrf
        <tr>

            <td>用户名：</td><td><INPUT type="text" name="reg_name"></td>

        </tr>

        <tr>

            <td>密码：</td><td><input type="password" name="reg_pwd"></td>

        </tr>

        <tr>

            <td><input type="submit" value="登录"></td>

        </tr>

    </table>

</form>
</body>
</html>
