<form action="<?php echo url("api/login") ?>" method="post" style="width: 500px; position: absolute; top: 100px; left: 0; right: 0; bottom: 0; margin: auto;" id="login_form">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-4">
                    <img src="<?php echo asset("img/logo.jpg") ?>" class="img-responsive">
                </div>
                <div class="col-xs-8">
                    <h4>Northernwind Digital Solution Co.,Ltd.</h4>
                    <p><input type="text" name="username" placeholder="Username" class="form-control" required=""></p>
                    <p><input type="password" name="password" placeholder="Password" class="form-control" required=""></p>
                    <p>
                        <button type="submit" data-loading-text="Logging in..." class="btn btn-primary" id="submit_btn"><i class="glyphicon glyphicon-log-in"></i>&nbsp;Login</button>
                        <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i>&nbsp;Reset</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        $('#login_form').ajaxForm({
            beforeSend: function() {
                $('#submit_btn').button('loading');
            },
            complete: function(xhr) {
                var json = $.parseJSON(xhr.responseText);
                if (json.status === "success") {
                    swal({title: "สำเร็จ", text: "ระบบทำการลงชื่อใช้งานเรียบร้อย", type: 'success', timer: 2000});
                    setTimeout(function() {
                        location.href = json.url;
                    }, 2000);
                } else {
                    swal({title: "ล้มเหลว", text: "ระบบไม่สามารถลงชื่อใช้งาน", type: 'error'});
                }
                $('#submit_btn').button('reset');
            }
        });
    });
</script>