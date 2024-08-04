<?php 
include('header.html');
require 'database.php';
?>
            <div class="container">
                <div class="login">
                    <form action="">
                        <h1>Sign Up</h1>
                        <p>Diet Meal's Monitor</p>
                        <div>
                            <label for="">Username</label>
                            <input type="txt" id="txtname" name="txtname"/>
                        </div>
                        <div>
                            <label for="">Email</label>
                            <input type="txt" id="txtemail" name="txtemail"/>
                        </div>
                        <div>
                            <label for="">Password</label>
                            <input type="password" id="password" name="password"/>
                        </div>
                        <div>
                            <p><a href="" class="tbl-kuning">Sign Up!!</a> </p>
                        </div>
                        <p><a href="#" class="lupapass">Forgot Password?</a></p>
                        <div class="kanan">
                            <img src="assetregis/peas.png" alt="">
                        </div>
                        
                        
                    </form>
                </div>
            </div>
<?php 
 include ('footer.html');
 ?>