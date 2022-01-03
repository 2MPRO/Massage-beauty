
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



   
   

 
});
////


