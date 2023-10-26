<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="event-schedule-area-two bg-color pad100">
                        <div class="container">
                            <div class="dropup position-absolute bottom-0 end-0 rounded-circle m-5">
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">...</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title text-center">
                                        <div class="title-text">
                                            <h2>SecureVault</h2>
                                        </div>
                                        <p>
                                            Here are your items<br />
                                            Don't worry about the security! just Worry about your future LOL!
                                        </p>
                                    </div>
                                </div>
                                <!-- /.col end-->
                            </div><br>
                            <div style="text-align: center">
                                <form action="/upload" method="GET">
                                    <div class="btn btn-success btn-rounded">
                                        <input class="form-label text-white m-1" type="submit" value="Upload"/>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <!-- row end-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center" scope="col">Upload Date</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">name</th>
                                                        <th scope="col">description</th>
                                                        <th scope="col">defects</th>
                                                        <th scope="col">amount</th>
                                                        <th scope="col">edit</th>
                                                        <th scope="col">delete</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(isset($items))
                                                        @foreach ($items as $file)
                                                            <tr class="inner-box">
                                                                <th scope="row">
                                                                    <div class="event-date">
                                                                        <p>{{ $file->created_at->format('Y-m-d') }}</p>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <div class="event-img">
                                                                        <img src="{{ asset(str_replace('public/', 'storage/', $file->img)) }}"  style="width: 100px" alt="Your Image">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="event-wrap">
                                                                        <h3>{{$file->name}}</h3>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="event-wrap">
                                                                        <h3>{{$file->desc}}</h3>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="event-wrap">
                                                                        <h3>{{$file->defects}}</h3>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="event-wrap">
                                                                        <h3>{{$file->amount}}</h3>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="event-wrap">
                                                                        <a href="/edit/{{$file->id}}" style="background-color: #2563eb" class="text-white">
                                                                            <button>Edit</button>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="event-wrap">
                                                                        <a href="/delete/{{$file->id}}" style="background-color: #2563eb" class="text-white">
                                                                            <button>Delete</button>
                                                                        </a>                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /col end-->
                            </div>
                            <!-- /row end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
