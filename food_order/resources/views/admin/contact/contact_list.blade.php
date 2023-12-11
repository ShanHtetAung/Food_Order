@extends('admin.layouts.admin')

@section('title', 'User')

@section('content')
    <table id="contact_list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>User_Name</th>
                <th>User_Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr id="tr_{{ $contact->id }}">
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-danger"
                            onclick="deleteContactList({{ $contact->id }})">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('script')
    <script>
        new DataTable('#contact_list');
    </script>
    <script src="{{ asset('assets/js/admin/contact_list_delete.js') }}"></script>
@endsection
