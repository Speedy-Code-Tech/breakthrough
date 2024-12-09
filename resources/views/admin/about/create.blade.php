@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
    <div class="mainTabs">
        <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
            <div class="col text-start" style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">
                ABOUT US - CREATE OFFICERS
            </div>
        </div>
        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div id="dynamic-form"  style="height: 300px; overflow-y: scroll; overflow-x: hidden;">
                <div class="member-row mb-3 pb-3" style="border-bottom:1px solid; ">
                    <div class="row d-flex gap-2">
                        <div>
                            <input type="text" name="members[0][fname]" class="form-control" placeholder="First Name"
                                required>
                        </div>
                        <div>
                            <input type="text" name="members[0][mname]" class="form-control" placeholder="Middle Name">
                        </div>
                        <div>
                            <input type="text" name="members[0][lname]" class="form-control" placeholder="Last Name"
                                required>
                        </div>
                        <div>
                            <input type="text" name="members[0][position]" class="form-control" placeholder="Position"
                                required>
                        </div>
                        <div>
                            <input type="file" name="members[0][image]" class="form-control" required>
                        </div>
                        <div class="container-fluid text-end">
                            <button type="button" class="btn btn-danger remove-row">X DELETE</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="container d-flex justify-content-start align-items-start gap-1">
                <button type="button" id="add-row" class="btn btn-primary mb-3">Add Member</button>
            <button type="submit" class="btn btn-success">Submit</button>   
            </div>
        </form>
    </div>

    <script>
        let memberIndex = 1;

        document.getElementById('add-row').addEventListener('click', function() {
            const form = document.getElementById('dynamic-form');
            const newRow = `
            <div class="member-row mb-3">
                <div class="member-row mb-3 pb-3" style="border-bottom:1px solid; ">
                    <div class="pb-2">
                        <input type="text" name="members[${memberIndex}][fname]" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="pb-2">
                        <input type="text" name="members[${memberIndex}][mname]" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="pb-2">
                        <input type="text" name="members[${memberIndex}][lname]" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="pb-2">
                        <input type="text" name="members[${memberIndex}][position]" class="form-control" placeholder="Position" required>
                    </div>
                    <div class="pb-2">
                        <input type="file" name="members[${memberIndex}][image]" class="form-control" required>
                    </div>
                    <div class="pb-2 container-fluid text-end">
                        <button type="button" class="btn btn-danger remove-row">X DELETE</button>
                    </div>
                </div>
            </div>
        `;
            form.insertAdjacentHTML('beforeend', newRow);
            memberIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                e.target.closest('.member-row').remove();
            }
        });
    </script>
@endsection
