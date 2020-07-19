//inisialisasi 
$('#txtDeliveryInfo').hide();

document.getElementById('txtTipePesanan').addEventListener("change", function(){
    let tipePesanan = document.getElementById('txtTipePesanan').value;
    if(tipePesanan === 'dinein'){
        
    }else if(tipePesanan === 'delivery'){
        $('#txtDeliveryInfo').show();
    }else if(tipePesanan === 'takehome'){

    }else if(tipePesanan === 'dinein'){

    }else{
        $('#txtDeliveryInfo').hide();
    }

});