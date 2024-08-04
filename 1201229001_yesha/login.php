<?php
include('header.php');
?>
<div class="tampilan">
    <form action="login_controller.php" method="POST">
        <div>
            <h2>Login</h2>
            <div>
                <label>username : </label>
                <input type="text" id="txtusr" name="txtusr" />
            </div>
            <div>
                <label>password: </label>
                <input type="passoword" id="txtpwd" name="txtpwd" />
            </div>
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id" required>

            </div>
            <div>
                <input type="submit" id="tbl-login" name="tbl-login" value="login" />
            </div>
            <a href="signup.php">Belum punya akkun?</a>
        </div>
    </form>
</div>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.tampilan {
    width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    text-align: center;
}

h2 {
    color: #333;
}

div {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

#tbl-login {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#tbl-login:hover {
    background-color: #45a049;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
<?php
include('footer.php')
?>
