var divMonitoring = new Vue({
    el : '#divMonitoring',
    data : {

    },
    methods : {
        setLeaveAtc : function(kdMeja)
        {
            
        },
        setActiveAtc : function(kdMeja)
        {
            setActive(kdMeja);           
        }
    }
});

function setLeave(kdMeja)
{
    $.post('monitoring/setLeave', {'kdMeja':kdMeja}, function(data){
        
    });
}

function setActive(kdMeja)
{
    $.post('monitoring/setActive', {'kdMeja':kdMeja}, function(data){
        let obj = JSON.parse(data);
        pesanUmumApp('success', 'Sukses', 'Meja di set ke aktif..');
        renderMenu(monitoring);
        divJudul.judulForm = "Monitoring Restoran";
        console.log(obj);
    });
}