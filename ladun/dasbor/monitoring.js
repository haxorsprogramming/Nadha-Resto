// ROUTE 
var routeSetLeave = server + "monitoring/setLeave";
var routeSetActive = server + "monitoring/setActive";

// VUE OBJECT 
var divMonitoring = new Vue({
    el : '#divMonitoring',
    data : {

    },
    methods : {
        setLeaveAtc : function(kdMeja)
        {
            setLeave(kdMeja);
        },
        setActiveAtc : function(kdMeja)
        {
            setActive(kdMeja);           
        }
    }
});

// FUNCTION  
function setLeave(kdMeja)
{
    $.post(routeSetLeave, {'kdMeja':kdMeja}, function(data){
        let obj = JSON.parse(data);
        pesanUmumApp('success', 'Sukses', 'Meja di set ke leave..');
        renderMenu(monitoring);
        divJudul.judulForm = "Monitoring Restoran";
    });
}

function setActive(kdMeja)
{
    $.post(routeSetActive, {'kdMeja':kdMeja}, function(data){
        let obj = JSON.parse(data);
        pesanUmumApp('success', 'Sukses', 'Meja di set ke aktif..');
        renderMenu(monitoring);
        divJudul.judulForm = "Monitoring Restoran";
    });
}