@extends('layout')
@section('content')
<section class="flex bg-dashboard font-['Poppins']">
        @include('navbar')
        <div class="w-full min-h-screen flex flex-col font-['Poppins']">
            <div class="flex justify-end">
                @include('admin.user_dropdown')
            </div>
            <h1 class="text-xl font-bold mx-10">Add New Client</h1>
            <p class="my-3 mx-10
            ">Add a new client to the system</p>
            <form action="{{url('api/v1/admin/clients')}}" method="POST" class="mx-10 my-5">
                @csrf
                <div class="flex flex-col">
                    <label for="name" class="text-sm">Name</label>
                    <input type="text" name="name" id="name" class="border rounded p-2">
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-sm">Email</label>
                    <input type="email" name="email" id="email" class="border rounded p-2">
                </div>
                <div class="flex flex-col">
                    <label for="phone" class="text-sm">Phone</label>
                    <input type="text" name="phone" id="phone" class="border rounded p-2">
                </div>
                <div class="flex flex-col">
                    <label for="address" class="text-sm">Address</label>
                    <input type="text" name="address" id="address" class="border rounded p-2">
                </div>
                <div class="flex flex-col">
                    <label for="client_status" class="text-sm">Client Status</label>
                    <select name="client_status" id="client_status" class="border rounded p-2">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn w-fit mt-5">Add Client</button>
            </form>
@endsection
