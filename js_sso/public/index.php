<html>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="http://keycloak.localhost/auth/js/keycloak.js"></script>
    <script src="assets/js/myLogic.js"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 500px;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #94ab9e;
            color:black;
        }
        tr:nth-child(odd) {
            color:whitesmoke;
        }
    </style>
</head>
<body onload="initKeycloak()">
<div id="header">
    <img id="logo" style="height: 150px; width: 150px; border-radius: 100%; padding: 15px 15px 15px 15px" src="./assests/img/hi5code_logo_medium.png" alt="hi5code.com">
    <h1 id="headerLabel" align="center">My hi5code School</h1>
</div>

<div id="table-attr">
    <table align="center">
        <tr>
            <th style="text-align:center;">Attributes</th>
            <th style="text-align:center;">Value</th>
        </tr>
        <tr>
            <td style="text-align:center;">Username</td>
            <td id="row-username" style="text-align:center;">${user.username}</td>
        </tr>
        <tr>
            <td style="text-align:center;">First Name</td>
            <td id="row-firstName" style="text-align:center;">${user.username}</td>
        </tr>
        <tr>
            <td style="text-align:center;">Last Name</td>
            <td id="row-lastName" style="text-align:center;">${user.username}</td>
        </tr>
        <tr>
            <td style="text-align:center;">Name</td>
            <td id="row-name" style="text-align:center;">${user.fullName}</td>
        </tr>
        <tr>
            <td style="text-align:center;">Email</td>
            <td id="row-email" style="text-align:center;">${user.email}</td>
        </tr>
    </table>
</div>
<div d="content" style="width:20%; margin:100px auto;">
    <div>
        <textarea id="ta-token">EMPTY</textarea>
        <textarea id="ta-refreshToken">EMPTY</textarea>
    </div>

    <input type="button" value="Update Token" onclick="refreshToken()" />

    <input type="button" value="LOGOUT" onclick="logout()" />
</div>
</body>
</html>