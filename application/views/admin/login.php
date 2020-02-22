<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('partial/head') ?>
</head>

<body class="login-page">
    <!-- Page Loader -->
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Login</a>
        </div>
        <div class="card">
            <div class="body">
                <form action="<?= base_url() ?>Login/f_login" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username">
                            <label class="form-label">Email Address</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="password">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                    <button type="submit" name="btn_login" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view('partial/js') ?>
</body>

</html>
<script>
    var x = document.getElementById("pass");
    x.type = "password";
    // if (x.type === "password") {
    //     x.type = "text";
    // } else {
    //     x.type = "password";
    // }
</script>
