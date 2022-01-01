<?php require_once("./Public/Carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;


?>

<h1>Thống kê</h1>
<input type="hidden" class = "now" value="<?=Carbon::now('Asia/Ho_Chi_Minh')->toDateString() ?>" name="">
 <select id="text-date" class="form-control">
     <option selected value="<?= Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString(); ?>"> 365 Ngày qua</option>
     <option value="<?= Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString(); ?>"> 30 Ngày qua</option>
     <option value="<?= Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString(); ?>"> 7 Ngày qua</option>
</select>


<div id="myfirstchart" style="height: 250px;"></div>
<script>
    $(document).ready(function(){
        thongke();
      var char =   new Morris.Area({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                // data: [
                // { month: '2021-1',customers: 20 ,sales: 20 },
                // { month: '2021-2',customers: 20 ,sales: 10 },
                // { month: '2021-3',customers: 20 ,sales: 5 },
                // { month: '2021-4',customers: 20 ,sales: 5 },
                // { month: '2021-5',customers: 20 ,sales: 20 },
                // { month: '2021-6',customers: 20 ,sales: 10 },
                // { month: '2021-7',customers: 20 ,sales: 5 },
                // { month: '2021-8',customers: 20 ,sales: 5 },
                // { month: '2021-9',customers: 20 ,sales: 20 },
                // { month: '2021-10',customers: 20 ,sales: 5 },
                // { month: '2021-11',customers: 20 ,sales: 5 },
                // { month: '2021-12',customers: 20 ,sales: 20 }
                // ],
                // The name of the data record attribute that contains x-values.
                xkey: 'date',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['customers','sales'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Lượt khách','Doanh thu']
            });

            $('#text-date').change(function(){
                thongke();
            })
        function thongke(){
            subdays=  $("#text-date").val();
            now = $('.now').val();
            $.ajax({
                    url: "Models/ajax/ajaxThongke.php",
                    method: "POST",
                    dataType:"JSON",
                    data:{subdays:subdays,now:now},
                    success: function (data) {
                        char.setData(data);
                    }
    
                })
        }
    });
</script>
 
