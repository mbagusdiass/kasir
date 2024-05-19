@section('title', 'Dashboard')

<x-app-layout>
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Dashboard</h3>
            @if (Auth::user()->type == 'admin')
                <a class="btn btn-primary btn-sm d-none d-sm-inline-block btn-icon-split" role="button"
                    href="{{ route('report.index') }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-download fa-sm text-white-50"></i>
                    </span>
                    <span class="text">Print Reports</span>
                </a>
            @endif
        </div>
        <div class="row">
            @if (Auth::user()->type == 'admin')
                <x-dashboard.admin-info :todayRevenue="$todayRevenue" :monthRevenue="$monthRevenue" :categories="$categories" :products="$products" />
            @else
                <x-dashboard.user-info :todaySales="$todaySales" :monthSales="$monthSales" :categories="$categories" :products="$products" />
            @endif
        </div>
        @if (Auth::user()->type == 'admin')
            <div class="row">
                <div class="col-12 col-xl-9">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class=" fw-bold m-0">
                                Revenue {{ indonesia_date($startDate) }} to {{ indonesia_date($endDate) }}
                            </h6>
                            <div class="dropdown no-arrow">
                                <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false"
                                    data-bs-toggle="dropdown" type="button">
                                    <i class="fas fa-ellipsis-v text-gray-400"></i>
                                </button>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                    <a class="dropdown-item" href="{{ route('sale.index') }}">&nbsp;See Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas>
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">
                                Produk Terlaris
                            </h6>
                            <div class="dropdown no-arrow">
                                <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false"
                                    data-bs-toggle="dropdown" type="button">
                                    <i class="fas fa-ellipsis-v text-gray-400"></i>
                                </button>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                    <a class="dropdown-item" href="{{ route('sale.index') }}">&nbsp;See Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th width='5%'>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($bestSellers->count() > 0)
                                        @foreach ($bestSellers as $bestSeller)
                                            <tr>
                                                <td>{{ $bestSeller->products->name }}</td>
                                                <td class="text-center">{{ $bestSeller->quantity }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">Not Found</td>
                                        </tr>
                                    @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @push('scripts')
        @if (Auth::user()->type == 'admin')
            <script src="{{ asset('assets/js/chart.min.min.js') }}"></script>

            <script>
                new Chart($('.chart-area canvas'), {
                    "type": "line",
                    "data": {
                        "labels": {{ json_encode($labelChart) }},
                        "datasets": [{
                            "label": "revenue",
                            "fill": true,
                            "data": {{ json_encode($dataChart) }},
                            "backgroundColor": "#E493B3",
                            "borderColor": "#EE4266",
                        }]
                    },
                    "options": {
                        "maintainAspectRatio": false,
                        "legend": {
                            "display": false,
                            "labels": {
                                "fontStyle": "normal"
                            }
                        },
                        "title": {
                            "fontStyle": "normal"
                        },
                        "scales": {
                            "xAxes": [{
                                "gridLines": {
                                    "color": "rgb(234, 236, 244)",
                                    "zeroLineColor": "rgb(234, 236, 244)",
                                    "drawBorder": false,
                                    "drawTicks": false,
                                    "borderDash": ["2"],
                                    "zeroLineBorderDash": ["2"],
                                    "drawOnChartArea": false
                                },
                                "ticks": {
                                    "fontColor": "#858796",
                                    "fontStyle": "normal",
                                    "padding": 20
                                }
                            }],
                            "yAxes": [{
                                "gridLines": {
                                    "color": "rgb(234, 236, 244)",
                                    "zeroLineColor": "rgb(234, 236, 244)",
                                    "drawBorder": false,
                                    "drawTicks": false,
                                    "borderDash": ["2"],
                                    "zeroLineBorderDash": ["2"]
                                },
                                "ticks": {
                                    "fontColor": "#858796",
                                    "fontStyle": "normal",
                                    "padding": 20
                                }
                            }]
                        }
                    }
                })
            </script>
        @endif
    @endpush
</x-app-layout>
