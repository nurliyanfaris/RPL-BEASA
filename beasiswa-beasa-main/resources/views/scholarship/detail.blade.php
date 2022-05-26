<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update File</h3>
                {{-- <p class="text-subtitle text-muted">Create Scholarship</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Scholarship</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h1>Registrant Information</h1>
                        <p>
                            <strong>Name:</strong> {{ $user->name }}<br>
                            <strong>Email:</strong> {{ $user->email }}<br>
                            <strong>Phone:</strong> {{ $user->phone_number ? $user->phone_number : '-' }}<br>
                            <strong>Social Media:</strong> {{ $user->social_media ? $user->social_media : '-' }}<br>
                    </div>
                    <div class="col-6">
                        <h1>Registrant Files</h1>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">CV</label>
                                <a href="{{ $file->cv }}" target="_blank">
                                    <p>Click here to see the CV documentation</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Grades</label>
                                <a href="{{ $file->grades }}" target="_blank">
                                    <p>Click here to see the Grades documentation</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Letter 1</label>
                                <a href="{{ $file->letter1 }}" target="_blank">
                                    <p>Click here to see the Letter 1 documentation</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Letter 2</label>
                                <a href="{{ $file->letter2 }}" target="_blank">
                                    <p>Click here to see the Letter 2 documentation</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">KK</label>
                                <a href="{{ $file->kk }}" target="_blank">
                                    <p>Click here to see the KK documentation</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Photo</label>
                                <a href="{{ $file->photo }}" target="_blank">
                                    <p>Click here to see the Photo documentation</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                            <a href="{{ route('scholarship.registrant.detail.accept', [$scholarship_id, $user_id]) }}"
                                class="btn btn-success">Accept</a>
                            <a href="{{ route('scholarship.registrant.detail.decline', [$scholarship_id, $user_id]) }}"
                                class="btn btn-danger">Decline</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
