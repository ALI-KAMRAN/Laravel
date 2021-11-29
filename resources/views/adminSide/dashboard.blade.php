@extends('adminSide.masterPage.master')

@section('title')
Dashboard
@endsection


@section('style')

@endsection


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>


                     <!-- Content Row -->
                     <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <a href="{{url('categries')}}" class="custom-anchor">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Categories</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categoriesCount ?? ''}}</div>
                </div>
                <div class="col-auto">
                    <i class="fab fa-cuttlefish fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>



<div class="col-xl-4 col-md-6 mb-4">
    <a href="{{url('tag')}}" class="custom-anchor">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Tags</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tagCount ?? ''}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-tags fa-2x"></i>
                   
                </div>
            </div>
        </div>
    </div>
    </a>
</div>



<div class="col-xl-4 col-md-6 mb-4">
    <a href="{{url('blog')}}" class="custom-anchor">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Blogs</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$blogsCount ?? ''}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-table fa-2x"></i>
                   
                </div>
            </div>
        </div>
    </div>
    </a>
</div>



<div class="col-xl-4 col-md-6 mb-4">
    <a href="{{url('awaitingBlogs')}}" class="custom-anchor">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Published Blogs</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$publishedBlogsCount ?? ''}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-check fa-2x"></i>
                   
                </div>
            </div>
        </div>
    </div>
    </a>
</div>


<div class="col-xl-4 col-md-6 mb-4">
    <a href="{{url('awaitingBlogs')}}" class="custom-anchor">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Awaiting Blogs</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$awaitingBlogsCount ?? ''}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-clock fa-2x"></i>
                   
                </div>
            </div>
        </div>
    </div>
    </a>
</div>


<div class="col-xl-4 col-md-6 mb-4">
    <a href="{{url('viewAllUsers')}}" class="custom-anchor">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Users</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$usersCount ?? ''}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x"></i>
                   
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
</div>



<div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                  
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Category
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Tags
                                        </span>
                                         <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Blogs
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Publish Blogs
                                        </span>
                                         <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Awaiting Blogs
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Users
                                        </span>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


@endsection


@section('scripts')
 <!-- Page level plugins -->
   

    <!-- Page level custom scripts -->
  

<script type="text/javascript">
    
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Category", "Tags", "Blogs","Publish Blogs","Awaiting Blogs","Users"],
    datasets: [{
      data: [{{$categoriesCount}}, {{$tagCount}}, {{$blogsCount}},{{$publishedBlogsCount}},{{$awaitingBlogsCount}},{{$usersCount}}],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#f6c23e','#e74a3b','#858796'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
    <!-- Page level custom scripts -->
  
    <script src="js/demo/chart-pie-demo.js"></script>
@endsection
