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
            // window.alert(kdMeja);
            $('.'+kdMeja).removeClass('btn-warning');
            $('.'+kdMeja).addClass('btn-info');
            // document.getElementById()
        }
    }
});