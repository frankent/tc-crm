<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body style="font-family: arial,sans-serif;">
        <table style="border: 1px solid #efefef; border-radius: 4px; box-shadow: 1px 1px 2px #222;" width="100%">
            <tr>
                <td width="120px;">
                    <img src="<?php echo asset("img/logo_mail.jpg") ?>" style="max-width: 100%;">
                </td>
                <td style=" vertical-align: bottom;">
                    <h3 style="margin-bottom: 0px;">Northernwind Digital Solution Co.,Ltd</h3>
                    <p style="margin: 6px 0px 0px;">122/99 M.2 T.Donkaew A.Maerim Chiangmai Thailand 50180</p>
                    <p style="margin: 6px 0px;">Tel: 095-449-2332</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="padding: 15px 15px 0px;">
                        <?php $month = array('' => '--กรุณาเลือก--', '1' => 'มกราคม', '2' => 'กุมภาพันธ์', '3' => 'มีนาคม', '4' => 'เมษายน', '5' => 'พฤษภาคม', '6' => 'มิถุนายน', '7' => 'กรกฎาคม', '8' => 'สิงหาคม', '9' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤษจิกายน', '12' => 'ธันวาคม'); ?>
                        <p style="text-align: right;"><b>วันที่</b> <?php echo date('j') . " " . $month[date('n')] . " " . (date('Y') + 543); ?></p>
                        <br/>
                        <p><b>เรื่อง</b> แจ้งการดูแลระบบเว็บไซต์และงานออกแบบ</p>
                        <p><b>เรียน</b> <?php echo $client->client_name; ?> | <i><?php echo $client->client_site ?></i></p>

                        <p style='text-indent: 30px;'>ทาง TryCatch&trade; ได้ทำการเปลี่ยนแปลงชื่อใหม่เป็น บริษัท นอร์ทเทรินวินด์ ดิจิตอล โซลูชั่น จำกัด ดังนั้นการดูแลระบบทั้งหมดของท่าน เช่น ระบบเว็บไซต์, ระบบเครื่องให้บริการข้อมูล, ระบบสำรองข้อมูล, งานทางด้านการออกแบบ และระบบฐานข้อมูล เป็นต้น จะถูกทำการดูแลโดย บริษัท นอร์ทเทรินวินด์ ดิจิตอล โซลูชั่น จำกัด แทนตั้งแต่วันที่ 30 มกราคม 2558</p>
                        <p style='text-indent: 30px;'>ซึ่งทั้งนี้ทางบริษัท นอร์ทเทรินวินด์ ดิจิตอล โซลูชั่น จำกัด ได้แนบข้อมูลเพื่อการยืนยัน หรือตรวจสอบวันครบกำหนดการต่ออายุเว็บไซต์ และระบบเซิฟเวอร์บริการข้อมุลของท่าน มาตามข้อมูลด้านล่างนี้</p>

                        <h4 style='text-align: center; background-color: #f5873a; margin: 0px; padding: 20px; color: #000; text-shadow: 1px 1px 2px #fff;'><?php echo date('j', $client->create_date) . " " . $month[date('n', $client->create_date)]; ?> ของทุกปี</h4>

                        <p>ถ้าข้อมูลข้างต้นถูกต้องกรุณากดลิ้งเพื่อยืนยันข้อมูล</p>
                        <p><a href='<?php echo url("api/feedback/1/{$client->client_id}/1"); ?>'>ข้อมูลถูกต้อง</a> (ถ้าข้อมูลถูกต้องทางบริษัทจะกำหนด วันที่ <?php echo date('j', $client->create_date) . " " . $month[date('n', $client->create_date)]; ?> ของทุกปี เป็นวันครบกำหนดชำระค่าบริการ)</p>
                        <p>หรือถ้าข้อมูลไม่ถูกต้องกรุณากดลิ้งด้านล่าง</p>
                        <p><a href='<?php echo url("api/feedback/1/{$client->client_id}/0"); ?>'>ข้อมูลไม่ถูกต้อง</a> (รอการติดต่อกลับจากทางบริษัท)</p>

                        <br/>
                        <div style='text-align: right;'>
                            <div style='text-align: center; display: inline-block; margin-right: 20px;'>
                                <p style='margin: 0px;'>ขอแสดงความนับถือ</p>
                                <p style='margin: 0px;'>นางสาวพรนิชา แก่นสา</p>
                                <p style='margin: 0px;'>กรรมการผู้จัดการบริษัท</p>
                            </div>
                        </div>

                        <p style="text-align: center; font-size: 12px;">DO NOT Reply this email, Please contact us via `northernwind.digital@gmail.com`</p>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
