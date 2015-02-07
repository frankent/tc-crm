<div class="container">
    <div class="row bg-grey">
        <div class="col-xs-4">
            <div class="panel panel-default" style="margin-top: 15px;">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked"><?php $all_email = DB::table('email')->get(); ?>
                        <?php foreach ($all_email as $each_email): ?>
                            <li <?php echo $email_id == $each_email->email_id ? "class='active'" : ""; ?>><a href="<?php echo url("crm/email/{$each_email->email_id}"); ?>"><?php echo $each_email->email_name ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-8 bg-white">
            <h3><?php echo $email_package->email_name ?></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Clients' site</th>
                        <th>Email</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($client as $i => $each_client): ?>
                        <tr>
                            <td><?php echo $i + 1; ?></td>
                            <td><a href="<?php echo url("crm/clientinfo/{$each_client->client_id}"); ?>" target="_blank"><?php echo $each_client->client_site ?></a></td>
                            <td><?php echo $each_client->client_email ?></td>
                            <td><button class="btn btn-xs <?php echo array_key_exists($each_client->client_id, $client_feedback) ? ($client_feedback[$each_client->client_id]->feedback == 1 ? "btn-success" : "btn-danger") : "btn-default"; ?>"><i class="glyphicon glyphicon-share-alt"></i>&nbsp;feedback</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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