@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
<div class="mainTabs pe-0 m-0">
    <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
        <div class="col text-start" style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">
            UPDATED REQUESTS
        </div>
    </div>
    <div style="width: 90%;">
        <table id="myTable" style="font-size: 13px" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Requesting Party</th>
                    <th>Mobile Number</th>
                    <th>Email Address</th>
                    <th>Activity Title</th>
                    <th>Type of Coverage</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $index => $request)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $request->requesting_party }}</td>
                    <td>{{ $request->mobile_number }}</td>
                    <td>{{ $request->email_address }}</td>
                    <td>{{ $request->activity_title }}</td>
                    <td>{{ $request->coverage }}</td>
                    <td>{{ \Carbon\Carbon::parse($request->date)->format('F d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($request->time)->format('h:i A') }}</td>
                    <td>{{ $request->venue }}</td>
                    <td
                        class="fw-bold @if ($request->status == 'pending') text-warning
                                @elseif($request->status == 'approved')
                                    text-success
                                @elseif($request->status == 'deleted' || $request->status == 'rejected')
                                    text-danger @endif">
                        {{ $request->status ?? 'Pending' }}
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <!-- href="{{ route('request.edit', ['id'=>$request->id,'status'=>'approved']) }}"     -->
                            <a href="{{route('request.view',['id'=>$request->id])}}" class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                </svg>
                            </a>
                            <a onclick='update("{{$request->id}}","Approve")'
                                class="text-success" aria-label="Approve">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-calendar2-check-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                                </svg>
                            </a>
                            <!-- href="{{ route('request.edit', ['id'=>$request->id,'status'=>'rejected']) }}" -->
                            <a onclick='update("{{$request->id}}","Reject")' class="text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-calendar2-x-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-6.6 5.146a.5.5 0 1 0-.708.708L7.293 10l-1.147 1.146a.5.5 0 0 0 .708.708L8 10.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 10l1.147-1.146a.5.5 0 0 0-.708-.708L8 9.293z" />
                                </svg>
                            </a>
                            <!-- href="{{ route('request.edit', ['id'=>$request->id,'status'=>'deleted']) }}" -->
                            <a onclick='update("{{$request->id}}","Delete")' class="text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg>
                            </a>
                            

                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    const update = (id, status) => {
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${status} with this request?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, proceed',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the
                const baseUrl = 'admin/request/edit';
                let s = '';
                if (status == 'Reject')
                    s = status.toLowerCase() + "ed"
                else
                    s = status.toLowerCase() + "d"

                const url = new URL(`${baseUrl}/${id}/${s}`, window.location.origin);
                // console.log(url.href)
                fetch(url.href).then(response => response)
                    .then(data => {
                        Swal.fire(`Request ${s} successfully`, '', 'success');

                        console.log('Success:', data);
                    })
                    .catch(error => {
                        Swal.fire(`Request ${s} failed`, '', 'error');
                        console.error('Error:', error);
                    });
            } else {
                // Action canceled
                Swal.fire(`${status} canceled!`, '', 'info');
            }
        });
    }
</script>
@endsection