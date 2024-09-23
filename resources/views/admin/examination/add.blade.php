<x-app-layout>
    <div class="content-wrapper" id="examination-index">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('examination.create') }}" enctype="multipart/form-data" id="examinationForm">
                    @csrf
                    <div id="stepper2" class="bs-stepper">
                        <div class="bs-stepper-header w-50 mb-10">
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
                                    <span class="bs-stepper-label">Note & Documents</span>
                                </button>
                            </div>
                            <div class="step" data-target="#test-nl-4">
                                <button type="button" class="btn step-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Receipt</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <div id="test-nl-1" class="content">
                                <div class="mb-3 row">
                                    <label for="name" class="form-label col-sm-2">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="address" class="form-label col-sm-2">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="5">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="phone_number" class="form-label col-sm-2">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Enter phone number" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date_of_birth" class="form-label col-sm-2">Date of Birth</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-primary" onclick="stepper2.next()">Next</button>
                                </div>
                            </div>
                            <div id="test-nl-2" class="content">
                                <div class="mb-3 row">
                                    <label for="height" class="form-label col-sm-2">Height</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" name="height" placeholder="Enter height" value="{{ old('height') }}">
                                        @error('height')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="height" class="form-label">cm</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="weight" class="form-label col-sm-2">Weight</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="Enter weight" value="{{ old('weight') }}">
                                        @error('weight')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="weight" class="form-label">kg</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="systole" class="form-label col-sm-2">Systole</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control @error('systole') is-invalid @enderror" id="systole" name="systole" placeholder="Enter systole" value="{{ old('systole') }}">
                                        @error('systole')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="systole" class="form-label">mmHg</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="diastole" class="form-label col-sm-2">Diastole</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control @error('diastole') is-invalid @enderror" id="diastole" name="diastole" placeholder="Enter diastole" value="{{ old('diastole') }}">
                                        @error('diastole')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="diastole" class="form-label">mmHg</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="heart_rate" class="form-label col-sm-2">Heart Rate</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control @error('heart_rate') is-invalid @enderror" id="heart_rate" name="heart_rate" placeholder="Enter heart rate" value="{{ old('heart_rate') }}">
                                        @error('heart_rate')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="heart_rate" class="form-label">bpm</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="respiration_rate" class="form-label col-sm-2">Respiration Rate</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control @error('respiration_rate') is-invalid @enderror" id="respiration_rate" name="respiration_rate" placeholder="Enter respiration rate" value="{{ old('respiration_rate') }}">
                                        @error('respiration_rate')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="respiration_rate" class="form-label">bpm</label>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="body_temperature" class="form-label col-sm-2">Body Temperature</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control @error('body_temperature') is-invalid @enderror" id="body_temperature" name="body_temperature" placeholder="Enter body temperature" value="{{ old('body_temperature') }}">
                                        @error('body_temperature')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="body_temperature" class="form-label">°C</label>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary" onclick="stepper2.previous()"><-</button>
                                    <button type="button" class="btn btn-primary" onclick="stepper2.next()">Next</button>
                                </div>
                            </div>
                            <div id="test-nl-3" class="content">
                                <div class="mb-3 row">
                                    <label for="examination_notes" class="form-label col-sm-2">Examination Notes</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('examination_notes') is-invalid @enderror" id="examination_notes" name="examination_notes" rows="5" placeholder="Enter examination notes">{{ old('examination_notes') }}</textarea>
                                        @error('examination_notes')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="documents" class="form-label col-sm-2">Documents</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control @error('documents') is-invalid @enderror" id="documents" name="documents[]" multiple accept=".pdf">
                                        @error('documents')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary" onclick="stepper2.previous()"><-</button>
                                    <button type="button" class="btn btn-primary" onclick="stepper2.next()">Next</button>
                                </div>
                            </div>
                            <div id="test-nl-4" class="content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <!-- <select class="form-select" id="medicine-select" name="medicine_id">
                                                <option value="">Select Medicine</option>
                                                
                                            </select> -->
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="dosage" name="dosage" placeholder="Dosage">
                                        </div>
                                        <button class="btn btn-primary" onclick="addMedicine()">Add</button>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Medicine</th>
                                                    <th>Dosage</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="medicine-list">
                                                <!-- Dynamically generated rows will be inserted here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary" onclick="stepper2.previous()"><-</button>
                                    <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <x-slot name="javascript">
        <script>
            var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                linear: false,
                animation: true
            })

            $(document).ready(function () {
                $('li[data-route="examination"]').addClass('active');
            })

            function submitForm() {
                document.getElementById('examinationForm').submit();
            }
        </script>
    </x-slot>
</x-app-layout>