<x-app-layout>
    <div class="content-wrapper" id="examination-index">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" onclick="location.href='/examination/add'">Add New</button>
                </div>
                <div class="table-responsive">
                    <table id="examinationTable" class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Examination ID</th>
                                <th>Patient Name</th>
                                <th>Examination Date</th>
                                <th>Doctor Name</th>
                                <th>Examination Notes</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($examinations as $examination)
                            <tr>
                                <td>{{ $examination->id }}</td>
                                <td>{{ $examination->patient_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($examination->appointment_date)->format('F j, Y') }}</td>
                                <td>{{ $examination->doctor_name }}</td>
                                
                                <td>{{ $examination->examination_notes }}</td>
                                
                                <td>
                                    <span class="badge" style="background-color: {{ $examination->latest_state === 'processed' ? 'green' : 'orange' }}; color: white;">
                                        {{$examination->latest_state}}
                                    </span>
                                </td>
                                
                                <td>
                                    @if($examination->latest_state =='processed')
                                    <a href="/receipt/{{ $examination->id }}" class="btn btn-info btn-sm">show</a>
                                    @else
                                    <a href="/receipt/{{ $examination->id }}/edit" class="btn btn-info btn-sm">edit</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
