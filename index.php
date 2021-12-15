<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    body {
    background-image: linear-gradient(to left top, #17a2b8, #14abc4, #12b3d1, #11bcde, #00000);
    height: 100vh;
    background-color: #0e0101;
    }
    #login .container #login-row #login-column .login-box {
    margin-top: 120px;
    max-width: 600px;
    height: 400px;
    border: 1px solid #9C9C9C;
    border-radius: 10px;
    background-image: linear-gradient(to bottom, ##696969, #a9b5b7, #bcc5c6, #cfd5d5, #e3e5e5);
    }
    #login .container #login-row #login-column .login-box #login-form {
    padding: 20px;
    }
    #login .container #login-row #login-column .login-box #login-form #register-link {
    margin-top: -85px;
    }
</style>

<body>
	<div id="login">
    <form action="click-to-call.php" method="POST">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="login-box col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">Discagem Click To Call</h3>
			<br>
			<div class="form-group">
                            <label for="callerid" class="text-info">Callerid:</label><br>
                            <input type="callerid" name="callerid" id="callerid" class="form-control">
                        </div>                        
			<div class="form-group">
                            <label for="norigem" class="text-info">Ramal Origem:</label><br>
                            <input type="norigem" name="norigem" id="norigem" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ndestino" class="text-info">Número Destino:</label><br>
                            <input type="ndestino" name="ndestino" id="ndestino" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Discar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
