<div class="container">
    <div class="row bg-grey">
        <div class="col-xs-4">
            <div class="panel panel-default" style="margin-top: 15px;">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?php echo url("crm/client"); ?>">All Client</a></li>
                        <li><a href="<?php echo url("crm/createclient"); ?>">Create Client</a></li>
                        <li class="active"><a href="<?php echo url("crm/clientinfo/{$client->client_id}") ?>">Profile</a></li>
                        <li><a href="<?php echo url("crm/list/{$client->client_id}") ?>">List</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-8 bg-white">
            <h3><?php echo $client->client_name ?></h3>
            <div class="well">
                <form method="post" class="form-horizontal" action="<?php echo url("api/updateclient/{$client->client_id}"); ?>" id="upload_form">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Name</label>
                        <div class="col-xs-9">
                            <input type="text" name="client_name" class="form-control" required="" value="<?php echo $client->client_name; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Email</label>
                        <div class="col-xs-9">
                            <input type="email" name="client_email" class="form-control" required="" value="<?php echo $client->client_email; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Tel</label>
                        <div class="col-xs-9">
                            <input type="text" name="client_tel" class="form-control" required="" value="<?php echo $client->client_tel; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Website</label>
                        <div class="col-xs-9">
                            <input type="text" name="client_site" class="form-control" required="" value="<?php echo $client->client_site; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Address</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" required="" name="client_address"><?php echo $client->client_address; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Project Start</label>
                        <div class="col-xs-9">
                            <div id="datepicker_app"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Note</label>
                        <div class="col-xs-9">
                            <textarea class="form-control" name="client_note"><?php echo $client->client_note; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">&nbsp;</label>
                        <div class="col-xs-9">
                            <button type="submit" class="btn btn-primary" data-loading-text="Submiting..." id="submit_btn"><i class="glyphicon glyphicon-upload"></i>&nbsp;Submit</button>
                        </div>
                    </div>

                    <input type="hidden" name="create_date" class="form-control" id="create_date_hide" value="<?php echo $client->create_date; ?>">
                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('#upload_form').ajaxForm({
            beforeSend: function () {
                $('#submit_btn').button('loading');
            },
            complete: function (xhr) {
                var json = $.parseJSON(xhr.responseText);
                if (json.status === "success") {
                    swal({title: "สำเร็จ", text: "ระบบดำเนินการสร้างระเบียนลูกค้าใหม่สำเร็จ", type: 'success'});
                    setTimeout(function () {
                        location.href = json.url;
                    }, 2000);
                } else {
                    swal({title: "ล้มเหลว", text: "ระบบไม่สามารถดำเนินการสร้างระเบียนลูกค้า", type: 'error'});
                }
                $('#submit_btn').button('reset');
            }
        });

        var raws_unix = $('#create_date_hide').val();
        var appointment_date = parseInt(raws_unix) * 1000;
        var dateObj = new Date(appointment_date);

        $('#datepicker_app').datepicker({
            language: "th",
            todayHighlight: true
        });

        $('#datepicker_app').datepicker("update", new Date(dateObj.getFullYear(), dateObj.getMonth(), dateObj.getDate()));

        $('#datepicker_app').datepicker().on("changeDate", function (e) {
            var unix = Date.parse(e.date) / 1000;
            unix += (60 * 60 * 6);
            console.log(unix);
            $('#create_date_hide').val(unix);
        });
    });
</script>