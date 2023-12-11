@extends('admin.layouts.admin')

@section('style')
    <style>
        #chart_container {
            width: 50vw;
            height: 30vh;
        }
    </style>
@endsection

@section('title', 'Dashboard')

@section('content')
    <div class="row d-flex">
        @if (count($users) != 0)
            <div class="col-4 offset-1 mt-4">
                <h4>Total Users</h4>
                <div class="card bg-white mb-3">
                    <div class="card-header text-black">Total User :
                        <?php echo count($users); ?>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('food.admin.user.list') }}" class="btn btn-info">View Details</a>
                    </div>
                </div>
            </div>
        @endif
        @if (count($ordersCompletedCount) != 0)
            <div class="col-4 offset-2 mt-4">
                <h4 class="text-success">Total Completed Orders</h4>
                <div class="card bg-white mb-3">
                    <div class="card-header text-success">Total Completed Orders :
                        <?php echo count($ordersCompletedCount); ?>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('food.admin.order.list') }}" class="btn btn-info">View Details</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row d-flex">
        @if (count($ordersCancelled) != 0)
            <div class="col-4 offset-1 mt-4">
                <h4 class="text-danger">Total Cancelled Orders</h4>
                <div class="card bg-white mb-3">
                    <div class="card-header text-danger">Total Cancelled Orders :
                        <?php echo count($ordersCancelled); ?>
                    </div>
                </div>
            </div>
        @endif
        @if (count($ordersInProgress) != 0)
            <div class="container col-4 offset-2 mt-4">
                <h4 class="text-secondary">Total In Progress Orders</h4>
                <div class="card bg-white mb-3">
                    <div class="card-header text-secondary">Total In Progress Orders :
                        <?php echo count($ordersInProgress); ?>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <h3 class="text-center mt-4 text-success">Completed Orders</h3>
    <div id="chart_container" class="mt-3 col-8 offset-3 text-center">
        <canvas id="orderChart"></canvas>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ordersCompleted = @json($ordersCompleted);
        var dates = ordersCompleted.map(order => order.date);
        var counts = ordersCompleted.map(order => order.count);
        var ctx = document.getElementById('orderChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Number of Orders',
                    data: counts,
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
@endsection
