<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Name <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td>
                    Username <input type="text" name="user">
                </td>
            </tr>
            <tr>
                <td>
                    Password <input type="password" name="pass">
                </td>
            </tr>
            <tr>
                <td>
                    City <select name="city">
                            <option value="">-select-</option>
                            <option value="kth">kathmandu</option>
                            <option value="ltr">lalitpur</option>
                            <option value="other">other</option>
                </td>
            </tr>
            <tr>
                <td>
                    Gender  <input type="radio" name="gen" id="gen" value="male">Male
                            <input type="radio" name="gen" id="gen" value="female">Female
                </td>
            </tr>
            <tr>
                <td>
                    Image <input type="file" name="f1">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="submit" name="sub">       
                </td>
            </tr>
</form>
        </table>
    </body>
</html>