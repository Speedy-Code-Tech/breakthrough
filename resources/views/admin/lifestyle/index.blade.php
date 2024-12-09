@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
    <div class="mainTabs">
        <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
            <div class="col text-start" style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">UPDATED
                LIFESTYLE ARTICLE</div>
            <div class="col text-end">
                <a href="{{ route('lifestyle.create') }}" class="btn btn-primary">ADD NEW</a>
            </div>
        </div>
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
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
                        <td>{{ $item->description }}</td>
                        <td>
                            <img src="{{ asset('storage/public/' . $item->image_path) }}" alt=""
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </td>
                        <td>PUBLISHED</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('lifestyle.edit', $item->id) }}" class="btn btn-warning">EDIT</a>
                                <a href="{{ route('lifestyle.destroy', $item->id) }}" class="btn btn-danger delete-news"
                                    data-id="{{ $item->id }}" onclick="event.preventDefault();">
                                    DELETE
                                </a>

                                <form id="delete-form-{{ $item->id }}"
                                    action="{{ route('lifestyle.destroy', $item->id) }}" method="POST"
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
