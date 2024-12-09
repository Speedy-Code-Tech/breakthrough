@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
    <div class="mainTabs">
        <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
            <div class="col text-start" style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">UPDATED
                GALLERY</div>
            <div class="col text-end">
                <a href="{{ route('gallery.create') }}" class="btn btn-primary">ADD NEW</a>
            </div>
        </div>
        <table id="myTables" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TITLE</th>
                    <th>IMAGE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="d-flex gap-1 flex-wrap">
                            @php
                                // Split the image paths into an array
                                $images = explode(',', $item->image_path);
                            @endphp
                            @foreach ($images as $image)
                                <a href="{{ asset('storage/public/' . $image) }}" target="_blank">
                                    <img src="{{ asset('storage/public/' . $image) }}" alt="Image"
                                        style="width: 50px; height: 50px; object-fit: cover; margin-right: 5px;">
                                </a>
                            @endforeach
                        </td>
                        <td>PUBLISHED</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-warning">EDIT</a>
                                <a href="{{ route('gallery.destroy', $item->id) }}" class="btn btn-danger delete-news"
                                    data-id="{{ $item->id }}" onclick="event.preventDefault();">
                                    DELETE
                                </a>

                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('gallery.destroy', $item->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-news');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior

                const newsId = this.getAttribute('data-id');
                const form = document.getElementById(`delete-form-${newsId}`);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the hidden form
                    }
                });
            });
        });
    });
</script>
