<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Pusher -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<div id="chartdiv"></div>
<div class="input-group">
    <select class="form-select" aria-label="Default select example" id='cluster' name='cluster'>
        <option selected>Cluster</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
    </select>
    <input id='score' name='score' class="form-control" type="text" placeholder="Score input" aria-label="default input example">
</div>
<button onclick="myFunction()"> ADD </button>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: false,
  panY: false,
  wheelX: "none",
  wheelY: "none"
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);

// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0,
  categoryField: "cluster",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {})
}));

xRenderer.grid.template.set("visible", false);

var yRenderer = am5xy.AxisRendererY.new(root, {});
var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0,
  min: 0,
  extraMax: 0.1,
  renderer: yRenderer
}));

yRenderer.grid.template.setAll({
  strokeDasharray: [2, 2]
});

// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "cluster",
  tooltip: am5.Tooltip.new(root, { dy: -25, labelText: "{valueY}" })
}));

// Set data
var data = [
  {
    cluster: "0",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/A04.png" }
  },
  {
    cluster: "1",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/C02.png" }
  },
  {
    cluster: "2",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/D02.png" }
  },
  {
    cluster: "3",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/E01.png" }
  },
  {
    cluster: "4",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/A04.png" }
  },
  {
    cluster: "5",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/C02.png" }
  },
  {
    cluster: "6",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/D02.png" }
  },
  {
    cluster: "7",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/E01.png" }
  },
  {
    cluster: "8",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/C02.png" }
  },
  {
    cluster: "9",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/D02.png" }
  },
  {
    cluster: "10",
    value: 0,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/E01.png" }
  }
];

am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element


series.columns.template.setAll({
  cornerRadiusTL: 5,
  cornerRadiusTR: 5
});

series.columns.template.adapters.add("fill", (fill, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", (stroke, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});


series.bullets.push(function() {
  return am5.Bullet.new(root, {
    locationY: 1,
    sprite: am5.Picture.new(root, {
      templateField: "bulletSettings",
      width: 50,
      height: 50,
      centerX: am5.p50,
      centerY: am5.p50,
      shadowColor: am5.color(0x000000),
      shadowBlur: 4,
      shadowOffsetX: 4,
      shadowOffsetY: 4,
      shadowOpacity: 0.6
    })
  });
});

xAxis.data.setAll(data);
series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
console.log(data);

function myFunction(){
    var cluster = $('#cluster').val();
    var score = $('#score').val();
    // console.log(data.find(x => x.name === "A"));
    data.find(x => x.cluster === cluster).value += Number(score); 
    // console.log(data.find(x => x.name === "A"));

    data.sort(function (x, y) {
        return x.value - y.value;
    });
    series.data.setAll(data); 
    xAxis.data.setAll(data);
    console.log(score);
}

Pusher.logToConsole = true;

var pusher1 = new Pusher('b485b70127147958e1fa', {
    cluster: 'ap1'
});

var channel = pusher1.subscribe('pusher_score');
channel.bind('up_score', function(response) {
    console.log('API PEE');
    console.log(response);
    // var cluster = response.message.cluster;
    // var score = Number(response.message.score);
    
    // // console.log(data.find(x => x.name === "A"));
    // data.find(x => x.cluster === cluster).value += Number(score); 
    // // console.log(data.find(x => x.name === "A"));

    // data.sort(function (x, y) {
    //     return x.value - y.value;
    // });
    // series.data.setAll(data); 
    // xAxis.data.setAll(data);
    // console.log(score);
});

var pusher2 = new Pusher('e07bc6c3ee7696ad0104', {
    cluster: 'ap1'
});

var channel = pusher2.subscribe('pusher_score');
channel.bind('up_score', function(response) {
    console.log('API SUN');
    // var cluster = response.message.cluster;
    // var score = Number(response.message.score);
    // console.log(score);
    // console.log(cluster);
    // // console.log(data.find(x => x.name === "A"));
    // data.find(x => x.cluster == cluster).value += Number(score); 
    // // console.log(data.find(x => x.name === "A"));

    // data.sort(function (x, y) {
    //     return x.value - y.value;
    // });
    // series.data.setAll(data); 
    // xAxis.data.setAll(data);
    // console.log(score);
});

</script>