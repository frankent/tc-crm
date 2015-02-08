<div class="container">
    <div class="row bg-grey">
        <div class="col-xs-4">
            <div class="panel panel-default" style="margin-top: 15px;">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?php echo url("crm/client"); ?>">All Client</a></li>
                        <li><a href="<?php echo url("crm/createclient"); ?>">Create Client</a></li>
                        <li><a href="<?php echo url("crm/clientinfo/{$client->client_id}") ?>">Profile</a></li>
                        <li class="active"><a href="<?php echo url("crm/list/{$client->client_id}") ?>">List</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-8 bg-white">
            <h3>รายการคิดเงิน <?php echo $client->client_site; ?></h3>
            <form class="form-horizontal" id="form_list">
                <div id="append_zone">
                    <?php if ($product): ?>

                    <?php endif; ?>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input type="text" name="product" placeholder="Description" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <input type="text" name="price" placeholder="Price" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-7">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
            <p class="txt_right"><button class="btn btn-xs btn-primary" type="button" id="add_more_btn"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add more</button></p>
        </div>
    </div>
</div>

<div class="hidden" id="template_rows">
    <div class="form-group">
        <div class="col-xs-7">
            <input type="text" name="product" placeholder="Description" class="form-control">
        </div>
        <div class="col-xs-4">
            <input type="text" name="price" placeholder="Price" class="form-control">
        </div>
        <div class="col-xs-1">
            <button class="btn btn-danger remove_btn" type="button"><i class="glyphicon glyphicon-minus-sign"></i></button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('#add_more_btn').click(function () {
            var html = $('#template_rows').html();
            $('#append_zone').append(html);
        });

        $('body').on('click', '.remove_btn', function () {
            $(this).parents('.form-group').slideUp(200, function () {
                $(this).remove();
            });
        });

        $('#form_list').submit(function () {
            var product = [];
            var price = [];
            var object = [];

            $('#form_list [name=product]').each(function (id, ele) {
                product.push($(ele).val());
            });

            $('#form_list [name=price]').each(function (id, ele) {
                price.push($(ele).val());
            });

            for (var i = 0; i < product.length; i++) {
                var temp = {};
                temp['product'] = product[i];
                temp['price'] = price[i];

                object.push(temp);
            }

            console.log(JSON.stringify(object));
            return false;
        });
    });
</script>