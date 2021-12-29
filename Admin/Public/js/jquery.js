


////// cate to view service
$(document).ready(function(){
$('#MaDM').change(function(){
  
    var idcate = $(this).val();
    $.ajax({
        url: "Models/ajax/ajax_action.php",
        method: "POST",
        data:{idcate:idcate},
        success:function(data){
            $('#MaSP').html(data);
        }
    })
})
 }) ;


$(document).ready(function(){
window.onload = function(){
        var idcate = $('#MaDM').val();
        var idDV = $('#MaSP').val();
        $.ajax({
        url: "Models/ajax/ajax_action.php",
        method: "POST",
        data:{idcate:idcate,idDV:idDV},
        success:function(data){
            $('#MaSP').html(data);
        }
    })
}
 });

 
 $(document).ready(function(){

    /// minus
    var MaHD = $('#idbill').val();
    $('.sdjfsdjf').each(function(i,element ){
    
     $(this).click(function(){
        let TongTien = parseInt($('#TongTien').text());
        var num = $(element).next().val()-1;
        if(num <1){
            alert("Không thể nhỏ hơn 1");
            num = 1;
            return;
        }
        var MaSP = $(element).prev().val();

        $(element).next().val(num); 
        var donGia = ($('.donGia').eq(i).text());
        ThanhTien = (parseInt(donGia) * parseInt(num));
        ThanhTienOLD = parseInt(($('.thanhTien').eq(i).text().replace("VNĐ",'')).split(',').join(''));

        
        console.log("Giá cũ"+ String(ThanhTienOLD));
        console.log("Giá Mới"+ String(ThanhTien));
        TongTien = (TongTien + ThanhTien ) - parseInt(ThanhTienOLD);
        console.log("Tong tien"+ String(TongTien));
        $('#TongTien').text(TongTien);
         $('.thanhTien').eq(i).text( ThanhTien + "VNĐ");

        $.ajax({
            url: "Models/ajax/ajax_action.php",
            method: "POST",
            data:{num:num,MaHD:MaHD,MaSP:MaSP,ThanhTien:ThanhTien,TongTien:TongTien},
            success:function(data){   
            }
           
        })
    })
})
    // plus
  
   
    $('.flus-quantity').each(function(i,element ){  
   //  let $sdjfsdjf = $('.sdjfsdjf');
 
     $(this).click(function(){
        let TongTien = parseFloat($('#TongTien').text());
         i = $('.flus-quantity').index(this);
         //alert($('.thanhTien').eq(i).text());
        var num = parseInt($(element).prev().val())+1;
        if(num <1){
            alert("Không thể nhỏ hơn 1");
            num = 1;
            return;
        }

        var MaSP = $(element).next().val();
        var donGia = ($('.donGia').eq(i).text());
      

        ThanhTien = (parseInt(donGia) * parseInt(num));

        ThanhTienOLD = parseInt($('.thanhTien').eq(i).text().replace("VNĐ",'').split(',').join(''));
        console.log("Giá cũ"+ String(ThanhTienOLD));
        console.log("Giá Mới"+ String(ThanhTien));

        TongTien = (TongTien - ThanhTienOLD) +  ThanhTien;
        console.log("Tong tien"+ String(TongTien));
        $('.thanhTien').eq(i).text( ThanhTien + "VNĐ");
        $('#TongTien').text(String(TongTien));
       
        $(element).prev().val(num); 
        $.ajax({
            url: "Models/ajax/ajax_action.php",
            method: "POST",
            data:{num:num,MaHD:MaHD,MaSP:MaSP,ThanhTien:ThanhTien,TongTien:TongTien,action:"flus"},
            success:function(data){   
            }
           
        })
    })
})

     }) ;
//// 


