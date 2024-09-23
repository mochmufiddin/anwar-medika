<x-app-layout>
    <div class="content-wrapper" id="examination-index">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-slate-400">
                                <h5>Patient Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Name:</label>
                                    <div class="col-sm-10">
                                        <span>{{ $examinationData->patient->name ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Address:</label>
                                    <div class="col-sm-10">
                                        <span>{{ $examinationData->patient->address ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Phone Number:</label>
                                    <div class="col-sm-10">
                                        <span>{{ $examinationData->patient->phone_number ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Date of Birth:</label>
                                    <div class="col-sm-10">
                                        <span>{{ $examinationData->patient->date_of_birth ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="card mb-3" style="background-color: {{ $examinationData->latestState->name === 'processed' ? 'green' : 'orange' }}; color: white;">
                            <div class="card-body">
                                <h5 class="card-title">Status</h5>
                                <p class="card-text">
                                    {{ $examinationData->latestState->name ?? 'Submitted' }}
                                </p>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-slate-400">
                                <h5>Vital Signs</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Height:</label>
                                    <div class="col-sm-8">
                                        <span>{{ $examinationData->vitalSigns->height ?? '' }} cm</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Weight:</label>
                                    <div class="col-sm-8">
                                        <span>{{ $examinationData->vitalSigns->weight ?? '' }} kg</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Systole:</label>
                                    <div class="col-sm-8">
                                        <span>{{ $examinationData->vitalSigns->systole ?? '' }} mmHg</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Diastole:</label>
                                    <div class="col-sm-8">
                                        <span>{{ $examinationData->vitalSigns->diastole ?? '' }} mmHg</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2">Heart Rate:</label>
                                    <div class="col-sm-8">
                                        <span>{{ $examinationData->vitalSigns->heart_rate ?? '' }} bpm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="test-nl-3" class="content">
                    <div class="card mb-3">
                        <div class="card-header bg-slate-400">
                            <h5>Examination Notes</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2">Examination Notes:</label>
                                <div class="col-sm-10">
                                    <span>{{ $examinationData->examination_notes ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-slate-400">
                            <h5>Uploaded Documents</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="form-label col-sm-2">Documents:</label>
                                <div class="col-sm-10">
                                    <ul class="list-group">
                                        @if(isset($examinationData->documents) && $examinationData->documents->isNotEmpty())
                                            @foreach($examinationData->documents as $document)
                                                <li class="list-group-item">
                                                    <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">{{ $document->file_name }}</a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="list-group-item">No documents uploaded.</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-slate-400">
                                <h5>Medicine Details</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Medicine</th>
                                            <th>Quantity</th>
                                            <th>Dosage</th>
                                        </tr>
                                    </thead>
                                    <tbody id="medicine-list">
                                        @foreach($examinationData->details as $item)
                                            <tr>
                                                <td>{{ $item->medication_name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->dosage }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($examinationData->details->isEmpty())
                                    <div class="alert alert-warning" role="alert">
                                        No medicines recorded for this examination.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <x-slot name="javascript">
        <script>
            $(document).ready(function () {
                $('li[data-route="examination"]').addClass('active');
            })
        </script>
    </x-slot>
</x-app-layout>