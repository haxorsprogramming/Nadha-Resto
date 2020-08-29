// ROUTE
var routeGetMenuTerlaris = server+'statistik/getMenuTerlaris';
var routeGetPemasukanHarian = server+'statistik/getPemasukanHarian';

// INISIALISASI 
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// FUNCTION 
function drawChart() {
    chartMenuTerlaris();
    chartPemesananTipe();
    chartGrafikPemasukanHarian();
}

function chartGrafikPemasukanHarian()
{
    var dataMenuBar = [];
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Tanggal');
    data.addColumn('number', 'Pendapatan');

    $.post(routeGetPemasukanHarian, function(data){
        let obj = JSON.parse(data);
        let pemasukanData = obj.pemasukan;
        pemasukanData.forEach(renderLineBar);
        function renderLineBar(item, index)
        {
            dataMenuBar.push([parseInt(pemasukanData[index].tanggal), parseInt(pemasukanData[index].nilai)]);
        }
    });

    setTimeout(function(){
        data.addRows(dataMenuBar);
        var options = { 
            hAxis: {title: 'Tanggal'},
            vAxis: { title: 'Pemasukan (Rp)'}
        };
        var chart = new google.visualization.LineChart(document.getElementById('pemasukanHarianChart'));
        chart.draw(data, options);
    }, 500);
}

function chartMenuTerlaris()
{
    // CREATE DATA TABLE
    var dataMenuBar = [];
    var dataBar = new google.visualization.DataTable();
    dataBar.addColumn('string', 'Menu');
    dataBar.addColumn('number', 'Total');
    $.post(routeGetMenuTerlaris, function(data){
        let obj = JSON.parse(data);
        let menuData = obj.menuData;
        menuData.forEach(renderPieBar);
        function renderPieBar(item, index)
        {
            dataMenuBar.push([menuData[index].nama, parseInt(menuData[index].total_dipesan)]);
        }
    });
    setTimeout(function(){
        dataBar.addRows(dataMenuBar);
        // SET CHART OPTIONS
        var options = {'width': 600,'height': 500};
        // DRAW CHART
        var chart = new google.visualization.PieChart(document.getElementById('menuTerlarisChart'));
        chart.draw(dataBar, options);
    }, 500);
}

function chartPemesananTipe()
{
    var dataMenuBar = [];
    var dataBar = new google.visualization.DataTable();
    dataBar.addColumn('string', 'Menu');
    dataBar.addColumn('number', 'Total');
    dataBar.addRows([['Dine in', 20], ['Take Home', 15]]);
    setTimeout(function(){
        dataBar.addRows(dataMenuBar);
        // SET CHART OPTIONS
        var options = {'width': 600,'height': 500};
        // DRAW CHART
        var chart = new google.visualization.PieChart(document.getElementById('tipePemesananChart'));
        chart.draw(dataBar, options);
    }, 200);
}