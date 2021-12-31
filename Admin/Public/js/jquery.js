


////// cate to view service
$(document).ready(function () {
    $('#MaDM').change(function () {

        var idcate = $(this).val();
        $.ajax({
            url: "Models/ajax/ajax_action.php",
            method: "POST",
            data: { idcate: idcate },
            success: function (data) {
                $('#MaSP').html(data);
            }
        })
    })
});


$(document).ready(function () {
    window.onload = function () {
        var idcate = $('#MaDM').val();
        var idDV = $('#MaSP').val();
        $.ajax({
            url: "Models/ajax/ajax_action.php",
            method: "POST",
            data: { idcate: idcate, idDV: idDV },
            success: function (data) {
                $('#MaSP').html(data);
            }
        })
    }
});


$(document).ready(function () {
    //// get date picker 
    $('#date-picker').change(function(){
        curDate = $('#date-picker').val();
        var dt = new Date(curDate);`enter code here`
        var date = dt.getDate();
        var month = dt.getMonth()+1;
        var year = dt.getFullYear();
        let  daynew = year +"-"+month +"-"+date;

        var today = new Date();
        var currentmonth = today.getMonth();
        var currentyear = today.getFullYear();
        var currentdate = today.getDate();
        console.log(daynew)
        if(today > dt){
            alert("Tính xuyên không ak? Chọn lại đi");
            $('#date-picker').val('dd/mm/yyyy');
        }
        else{
            $('#date-picker-hidden').val(daynew);
        }   
    })
    $('#time-picker').change(function(){
        let time = $('#time-picker').val();
        $('#time-picker-hidden').val(time);
  
    })






    /// minus
    var MaHD = $('#idbill').val();
      
 
    /*   -------- */ /* action new -------------------------------------------------------------------------  */
    

   

    $(".body-content").on("click",'.btn-action-newService',function () {
        let MaSP = $('#MaSP').val();
        let MaHD = $('.MaHD').val();
        let SoLuong ="";
        SoLuong = $('.SoLuong').val();
        if($('.SoLuong').val()==""){
            alert("Vui lòng nhập số lượng !");
            return;
        }
        let TongTien = parseInt($('#TongTien').val().replace("VNĐ", '').split(',').join(''));
        console.log(" Mã hóa đơn " + String(MaHD) + " ")
        console.log(" Mã sản phẩm " + String(MaSP) + " ")
        console.log(" Mã số lượng " + String(SoLuong) + " ")
        console.log(" TongTien " + String(TongTien) + " ")
        $.ajax({
            url: "Models/ajax/ajax_action.php",
            method: "POST",
            data: { num: SoLuong, MaHD: MaHD, MaSP: MaSP,TongTien:TongTien ,action: "addnew" },
            success: function (data) {
                $('#data-table-body').html(data);
                onPageLoad();
            }

        })
        
    })

  
   
    

    onPageLoad();
    function onPageLoad(){
        
        //delete 
        $(".btn-delete-billService").each(function(i,element){
            $(this).click(function(){
                i = $('.btn-delete-billService').index(this);
                let MaHD = $('.MaHD').val();
                let MaSP = $('.MaSP').eq(i).val();
                let ThanhTienOLD = parseInt($('.thanhTien').eq(i).text().replace("VNĐ", '').split(',').join(''));
                let TongTien = parseInt($('#TongTien').val().replace("VNĐ", '').split(',').join(''));
                TongTien = TongTien - ThanhTienOLD;

             
                        console.log(" TongTien " + String(TongTien) + " ")
                        $.ajax({
                            url: "Models/ajax/ajax_action.php",
                            method: "POST",
                            data: {MaHD: MaHD, MaSP: MaSP,TongTien:TongTien, action: "deletebillservice" },
                            success: function (data) {
                                $('#data-table-body').html(data);
                                onPageLoad();
                            }
                        })
                        
                    });
        })
      


        //minus
        $('.NEWminus').each(function (i, element) {

            $(this).on("click",function () {
                 i = $('.NEWminus').index(this);
                let MaHD = $('.MaHD').val();
                let TongTien = parseInt($('#TongTien').val().replace("VNĐ", '').split(',').join(''));
                var num = $(element).next().val() - 1;
                if(num==null){
                    alert("Vui lòng nhập số lượng !");
                    return;
                }
                if (num < 1) {
                    alert("Không thể nhỏ hơn 1");
                    num = 1;
                    return;
                }
               
                let MaSP = $('.MaSP').eq(i).val();
                let donGia = parseInt(($('.donGia').eq(i).text().replace("VNĐ", '').split(',').join('')));
                let ThanhTienOLD = parseInt($('.thanhTien').eq(i).text().replace("VNĐ", '').split(',').join(''));
                let ThanhTien = (parseInt(donGia) * parseInt(num));
                TongTien = (TongTien - ThanhTienOLD) + ThanhTien;
                $(element).next().val(num);
                $('#TongTien').val(TongTien);
              
                $('.thanhTien').eq(i).text(ThanhTien + "VNĐ");
    
                $.ajax({
                    url: "Models/ajax/ajax_action.php",
                    method: "POST",
                    data: { num: num, MaHD: MaHD, MaSP: MaSP,TongTien: TongTien, ThanhTien: ThanhTien},
                    success: function (data) {
                        
                    }
    
                })
            })
        })
        // plus
        $('.NEWflus-quantity').each(function (i, element) {
            $(this).click(function () {
                let TongTien = parseInt($('#TongTien').val().replace("VNĐ", '').split(',').join(''));
                i = $('.NEWflus-quantity').index(this);
                //alert($('.thanhTien').eq(i).text());
                let MaHD = $('.MaHD').val();
                let num = parseInt($(element).prev().val()) + 1;
                if(num==null){
                    alert("Vui lòng nhập số lượng !");
                    return;
                }
                let MaSP = $('.MaSP').eq(i).val();
                let donGia = parseInt(($('.donGia').eq(i).text().replace("VNĐ", '').split(',').join('')));
                let ThanhTienOLD = parseInt($('.thanhTien').eq(i).text().replace("VNĐ", '').split(',').join(''));
                let ThanhTien = (parseInt(donGia) * parseInt(num));
                TongTien = (TongTien - ThanhTienOLD) + ThanhTien;
    
               /*  console.log("mã hóa đơn" + String(MaHD));
                console.log("Số lượng" + String(num));
                console.log("Mã sản phẩm" + String(MaSP));
                console.log("Đơn giá" + String(donGia));
                console.log("Tong tien" + String(TongTien)); */
    
                $(element).prev().val(num);
                $('.thanhTien').eq(i).text(ThanhTien + " VNĐ");
                $('#TongTien').val(TongTien);
               
                
                $.ajax({
                    url: "Models/ajax/ajax_action.php",
                    method: "POST",
                    data: { num: num, MaHD: MaHD, MaSP: MaSP,TongTien: TongTien,ThanhTien: ThanhTien,action: "flus" },
                    success: function (data) {
                       
                    }
    
                })
            })
        })
    }
    /// delete booking 
    $('.delete-booking').each(function(i,element){
    $(this).click(function(){
        i = $('.delete-booking').index(this);
        let MaHD = $('.MaBooking').eq(i).val();
        alert("Xóa lịch")
        $.ajax({
            url: "Models/ajax/ajax_action.php",
            method: "POST",
            data: { MaHD:MaHD, action:"deleteBill"},
            success: function (data) {
               location.reload();
            }

        })
    })
})

 
});
////


