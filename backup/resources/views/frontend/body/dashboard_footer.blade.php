<!-- Scripts -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('frontend/js/mmenu.min.js') }}"></script>
<script src="{{ asset('frontend/js/tippy.all.min.js') }}"></script>
<script src="{{ asset('frontend/js/simplebar.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/snackbar.js') }}"></script>
<script src="{{ asset('frontend/js/clipboard.min.js') }}"></script>
<script src="{{ asset('frontend/js/counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom_jquery.js') }}"></script>

<!-- documentation: http://www.chartjs.org/docs/latest -->
<script src="js/chart.min.js"></script>
<script>
    Chart.defaults.global.defaultFontFamily = "Nunito";

    var config = {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "View User",
                backgroundColor: 'rgba(255,138,0,0.08)',
                borderColor: '#ff8a00',
                borderWidth: "3",
                data: [799, 630, 636, 644, 722, 680, 799, 722, 836, 644, 722, 780],
                pointRadius: 4,
                titleFontSize: 18,
                pointHoverRadius: 4,
                pointHitRadius: 10,
                pointBackgroundColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointBorderWidth: "3",
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                backgroundColor: '#333',
                titleFontSize: 15,
                titleFontColor: '#fff',
                bodyFontColor: '#fff',
                bodyFontSize: 13,
                displayColors: false,
                xPadding: 10,
                yPadding: 10,
                intersect: false
            },

            legend: {
                display: false
            },
            title: {
                display: false
            },

            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                },
                y: {
                    type: 'category',
                    position: 'left',
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Request State'
                    },
                    reverse: true
                }
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;

        }
    @endif
</script>



</body>

</html>
