<div class="container">
    <div class="row bg-grey">
        <div class="col-xs-4">
            <div class="panel panel-default" style="margin-top: 15px;">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="<?php echo url("crm/client"); ?>">All Client</a></li>
                        <li><a href="<?php echo url("crm/createclient"); ?>">Create Client</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-8 bg-white">
            <h3>รายการลูกค้าทั้งหมด</h3>

            <?php $new_obj = array(); ?>
            <?php foreach ($client as $each_client): ?>
                <?php
                $unix = mktime(0, 0, 0, date('n', $each_client->create_date), date('j', $each_client->create_date));
                $each_client->next_year = false;
                if ($today > $unix) {
                    $unix = mktime(0, 0, 0, date('n', $each_client->create_date), date('j', $each_client->create_date), (date('Y') + 1));
                    $each_client->next_year = true;
                }
                while (array_key_exists($unix, $new_obj)) {
                    $unix+=1;
                }
                $new_obj[$unix] = $each_client;
                ?>
            <?php endforeach; ?>
            <?php ksort($new_obj); ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Domain</th>
                        <th>Expire</th>
                        <th>Whois</th>
                        <th>Note</th>
                        <th>List</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ids = 0; ?>
                    <?php foreach ($new_obj as $expire => $each_client): ?>
                        <tr <?php echo!$each_client->next_year ? "class='table_future'" : ""; ?>>
                            <td><?php echo ++$ids; ?></td>
                            <td><?php echo $each_client->client_site; ?></td>
                            <td><?php echo date('d/m/Y', $expire); ?></td>
                            <td><a href="<?php echo "http://who.is/whois/{$each_client->client_site}" ?>" target="_blank" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;whois</a></td>
                            <td><button class="btn btn-xs <?php echo $each_client->client_note ? "btn-info" : "btn-default"; ?>" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo $each_client->client_note ? $each_client->client_note : "ไม่มีโน๊ต"; ?>"><i class="glyphicon glyphicon-search"></i>&nbsp;view</button></td>
                            <td><a href="<?php echo url("crm/list/{$each_client->client_id}") ?>" target="_blank" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-list"></i>&nbsp;list</a></td>
                            <td><a href="<?php echo url("crm/clientinfo/{$each_client->client_id}") ?>" target="_blank" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-share"></i>&nbsp;detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>