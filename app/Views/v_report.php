<style>
    #myChart{
        height: 537.6px !important; 
        width: 1076px !important;
    }
    .dChart{
        margin: auto;
        width: 70%;
        padding: 10px;
    }
</style>

<div class="dChart">
    <canvas id="myChart" ></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Pusher -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('b485b70127147958e1fa', {
    cluster: 'ap1'
});

var channel = pusher.subscribe('pusher_score');
channel.bind('up_score', function(data) {
    var cluster = Number(data.message.cluster);
    var score = Number(data.message.score);
    myChart.data.datasets[0].data[cluster] += score;
    myChart.update();
});

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function change_data(){
    myChart.data.datasets[0].data[2] += 50;
    myChart.update();
}


</script>