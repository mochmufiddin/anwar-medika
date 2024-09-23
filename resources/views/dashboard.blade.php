<x-app-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Patients</h5>
                                    <h2 class="card-text">{{ $totalPatients }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Total Examinations</h5>
                                    <h2 class="card-text">{{ $totalExaminations }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card text-white bg-info">
                                <div class="card-body">
                                    <h5 class="card-title">Total Doctors</h5>
                                    <h2 class="card-text">{{ $totalDoctors }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card text-white bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pharmacists</h5>
                                    <h2 class="card-text">{{ $totalPharmacists }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>