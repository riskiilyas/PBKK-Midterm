<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="vh-100 gradient-custom">
                    <div class="container py-5 h-100">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="col-12 col-lg-9 col-xl-7">
                                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                    <div class="card-body p-4 p-md-5">
                                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Upload File</h3>
                                            <form  id="registrationForm" method="POST" enctype="multipart/form-data">
                                                @csrf
{{--                                                <div>--}}
{{--                                                    <div class="mb-4 d-flex justify-content-center">--}}
{{--                                                        <img src="{{ asset('storage/img/file.png') }}" style="width: 300px;" id="previewImage" />--}}
{{--                                                    </div>--}}
{{--                                                    <div class="mb-4 d-flex justify-content-center">--}}
{{--                                                        <p id="file-title"></p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="d-flex justify-content-center">--}}
{{--                                                        <div class="btn btn-primary btn-rounded">--}}
{{--                                                            <label class="form-label text-white m-1" for="customFile1">Choose file</label>--}}
{{--                                                            <input type="file" name="file" accept=".jpg, .jpeg, .png, .pdf, .mp4" class="form-control d-none" id="customFile1" onchange="previewFile(event);"/>--}}
{{--                                                        </div>--}}
{{--                                                    </div><br>--}}
{{--                                                </div>--}}

                                                <span style="background-color: #2563eb">
                                                    <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                                                    <input type="file" name="file" accept=".jpg, .jpeg, .png" class="form-control d-none" id="customFile1"/>
                                                </span><br>

                                                 <label for="types">Select item type:</label>
                                                <select id="types" name="types">
                                                    @foreach($item_types as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select><br>
                                                <label for="conditions">Select condition:</label>
                                                <select id="conditions" name="conditions">
                                                    @foreach($conditions as $con)
                                                        <option value="{{$con->name}}">{{$con->name}}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <input type="text" id="key" name="name" class="form-control form-control-lg" placeholder="Item Name"/><br>
                                                <input type="text" id="key" name="desc" class="form-control form-control-lg" placeholder="Item Description"/><br>
                                                <input type="text" id="key" name="defects" class="form-control form-control-lg" placeholder="Defects"/><br>
                                                <input type="number" name="amount" class="form-control form-control-lg" placeholder="Amount"/><br>
                                                <br><span style="background-color: #2563eb">
                                                    <input class="form-label text-white m-1" type="submit" value="Submit"/>
                                                </span>

                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
