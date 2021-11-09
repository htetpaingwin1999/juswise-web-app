@extends('juswise-theme.master')

@section('title')
Empower Us
@endsection

@section('content')
{{-- Navigation --}}
@include('juswise-theme.navbar')

<section id="" class="detail-bg mt-5 home-ph"
    style="background-image: url('{{ asset('images/banner/donate-us.jpg') }}')">
    <div class="container">
        <div class="row min-vh-100 d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-white text-center main-cap-ph">
                    <h2 class="mb-3 fw-bolder text-secondary" style="font-family: 'Rampart One'">Empower Us</h2>
                    <p>
                        Thank you for taking interest in JusWise. Your support will crystallize our raw ideas into
                        life-changing innovations, all for the welfare of Myanmar’s Legal Community. You can be a part
                        of a CHANGE you want to WITNESS!
                    </p>
                </div>
            </div>
        </div>

    </div>

</section>

<div class="container p-5">
    <div class="row d-md-flex align-items-center justify-content-center">
        <div class="col-12  col-lg-5">
            <h3 style="font-family: 'Rampart One' ">Where Your Money Goes?</h3>
            <p>For every 10,000 MMK we spend, the quality of our research and services improve for you, your juniors and
                our legal community. Here’s how.
                JusX’s Expected Donation amount to be mid-completed site is 3,000 USD. Here are some essential expenses
                to continue and develop a free access to JusX.
            </p>
            <p>
                - We can maintain our JusX, Free Database Site, for every 30,000 MMK contribution per month.
            </p>
            <p>
                - We can manage a paid part-time job for a law-student or developer for every 40,000 MMK donation per
                month.
            </p>
        </div>
        <div class="col-12 col-lg-7  ">
            <div class="chart1">
                <canvas id="myChart"></canvas>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid p-3 " style="background-color: #DCF5FF;">

    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="">
                    <h3>JusX’s Donation Policy</h3>
                    <p>JusX is committed to respecting the privacy of our donors, whether the donation is made online,
                        by mail, or any other method.
                        This Donation Policy applies to and describes the types of information you may provide when you
                        donate to us through our website and how we will use and protect your private data.
                    </p>
                    <br>
                    <h3>How Effective are your Donations?</h3>
                    <p>
                        Your contributions allows JusX to develop and provide the top-quality legal database and support
                        to ensure access, education and inclusion not only for law-students but also for Lawyers of the
                        entire Myanmar’s Legal Community. <a href=""><u> Click Here</u></a> to read Our Donations
                        Management Details Plan. The terms of DMDP may change upon our Products. We will update it here
                        if JusWise changes the Plan.
                    </p>
                    <br>
                    <h3>Donors' Privacy</h3>
                    <p>
                        Donors can also give us anonymously or by post. <a href=""><u> Click Here</u></a> and fill that
                        form to donate by post. We will note and mention your name in our JusWise’s Annual Report.
                    </p>
                    <br>
                    <h3>Refunds</h3>
                    <p>
                        JusX has a refund policy in case a donation is made in error. If you contact the team within 3
                        days of making the donation we will return it to you within 30 days without charge.
                    </p>
                </div>


            </div>

        </div>
    </div>

</div>

@include('juswise-theme.footer')
@endsection

@section('foot')
<script src="{{ asset('dashboard/assets/Vendor/chart_js/Chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Data Operations', 'Site Development','Support Costs','Financial Aids to Law Students'],
            datasets: [{
                label: 'Hein Htet Zaw',
                data: [40, 30, 20,10],
                backgroundColor: [
                    'rgba(121, 216, 82)',
                    'rgba(129, 160, 170,0.56)',
                    'rgba(255, 255, 102)',
                    'rgb(152, 204, 255)'
                                        ],
                                        
                 hoverBackgroundColor: [
                    'rgba(70, 239, 0)',
                    'rgb(84, 111, 120)',
                    'rgba(255, 255, 0)',
                    'rgba(51, 153, 255)',
                     ],
                                             
                     hoverBorderColor: [
                     'rgba(70, 239, 0)',
                     'rgb(84, 111, 120)',
                    'rgba(255, 255, 0)',
                    'rgba(51, 153, 255)',
                     ],

              
                hoverOffset: "24px"
            }]
        },
        options: {
            legend:{
                display:true,
                position: 'bottom',
                labels:{
                    fontColor:'#333',
                    usePointStyle:true
                }
            }

        }
    });
</script>
@endsection