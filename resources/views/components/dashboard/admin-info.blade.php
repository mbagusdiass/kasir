@props(['todayRevenue', 'monthRevenue', 'categories', 'products'])

<div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow border-start-success py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">
                    <div class="text-uppercase text-success fw-bold text-xs mb-1">
                        <span>Today's Revenue</span>
                    </div>
                    <div class="text-dark fw-bold h5 mb-0">
                        <span>Rp. {{ indonesia_format($todayRevenue) }}</span>
                    </div>
                </div>
                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow border-start-primary py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">
                    <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                        <span>This month's revenue</span>
                    </div>
                    <div class="text-dark fw-bold h5 mb-0">
                        <span>Rp{{ indonesia_format($monthRevenue) }}</span>
                    </div>
                </div>
                <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow border-start-info py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">
                    <div class="text-uppercase text-info fw-bold text-xs mb-1">
                        <span>Categories</span>
                    </div>
                    <div class="text-dark fw-bold h5 mb-0"><span>{{ $categories }}</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-tags fa-2x text-gray-300"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3 mb-4">
    <div class="card shadow border-start-warning py-2">
        <div class="card-body">
            <div class="row align-items-center no-gutters">
                <div class="col me-2">
                    <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Products</span>
                    </div>
                    <div class="text-dark fw-bold h5 mb-0"><span>{{ $products }}</span></div>
                </div>
                <div class="col-auto"><i class="fas fa-box fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
