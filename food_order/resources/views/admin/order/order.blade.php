@foreach ($orders as $order)
    <ul>
        <li>{{ $order->user_id }}</li>
        <li>{{ $order->order_code }}</li>
        <li>{{ $order->total_price }}</li>
        <li>{{ $order->status }}</li>
    </ul>
@endforeach

<div>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js">
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = @json($data);

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
            datasets: [{
                label: 'Chart Title',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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
</script>
