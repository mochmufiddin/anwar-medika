<x-app-layout>
    <div class="content-wrapper" id="examination-index">
        <div class="row">
            <div class="col-sm-12">
                <div id="stepper2" class="bs-stepper">
                    <div class="bs-stepper-header w-50">
                        <div class="step" data-target="#test-nl-1">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Patient</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-nl-2">
                            <div class="btn step-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Vital Sign</span>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#test-nl-3">
                            <button type="button" class="btn step-trigger">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Receipt</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <div id="test-nl-1" class="content">
                            <div class="mb-3 row">
                                <label for="name" class="form-label col-sm-2">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="form-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone_number" class="form-label col-sm-2">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone_number" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="date_of_birth" class="form-label col-sm-2">Date of Birth</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" id="date_of_birth">
                                </div>
                            </div>
                            <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                        </div>
                        <div id="test-nl-2" class="content">
                            <div class="mb-3 row">
                                <label for="height" class="form-label col-sm-2">Height</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="height" placeholder="Enter height">
                                </div>
                                <div class="col-sm-2">
                                    <label for="height" class="form-label">cm</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="weight" class="form-label col-sm-2">Weight</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="weight" placeholder="Enter weight">
                                </div>
                                <div class="col-sm-2">
                                    <label for="weight" class="form-label">kg</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="systole" class="form-label col-sm-2">Systole</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="systole" placeholder="Enter systole">
                                </div>
                                <div class="col-sm-2">
                                    <label for="systole" class="form-label">mmHg</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="diastole" class="form-label col-sm-2">Diastole</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="diastole" placeholder="Enter diastole">
                                </div>
                                <div class="col-sm-2">
                                    <label for="diastole" class="form-label">mmHg</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="heart_rate" class="form-label col-sm-2">Heart Rate</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="heart_rate" placeholder="Enter heart rate">
                                </div>
                                <div class="col-sm-2">
                                    <label for="heart_rate" class="form-label">bpm</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="respiration_rate" class="form-label col-sm-2">Respiration Rate</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="respiration_rate" placeholder="Enter respiration rate">
                                </div>
                                <div class="col-sm-2">
                                    <label for="respiration_rate" class="form-label">bpm</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="body_temperature" class="form-label col-sm-2">Body Temperature</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="body_temperature" placeholder="Enter body temperature">
                                </div>
                                <div class="col-sm-2">
                                    <label for="body_temperature" class="form-label">°C</label>
                                </div>
                            </div>
                            <button class="btn btn-secondary" onclick="stepper2.previous()"><-</button>
                            <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                        </div>
                        <div id="test-nl-3" class="content">
                            <p class="text-center">test 5</p>
                            <button class="btn btn-primary" onclick="stepper2.next()">Next</button>
                            <button class="btn btn-primary" onclick="stepper2.previous()">Previous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-slot name="javascript">
        <script>
            // $(document).ready(function () {
                var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                    linear: false,
                    animation: true
                })
            // })
        </script>
    </x-slot>
</x-app-layout>