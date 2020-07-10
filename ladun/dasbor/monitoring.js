var divMonitoring = new Vue({
    el : '#divMonitoring',
    data : {

    },
    methods : {
        setLeaveAtc : function(kdMeja)
        {
            window.alert(kdMeja);
        },
        setActiveAtc : function(kdMeja)
        {
            //use reload form
            $.post('monitoring/setActive', {'kdMeja':kdMeja}, function(data){
                let obj = JSON.parse(data);
                console.log(obj);
            });
        }
    }
});