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

    <form action="{{ route('file.edit.process') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
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
                        <div class="col-6">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload New CV</label>
                                    <input type="file" class="form-control" name="cv" id="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload New Grades</label>
                                    <input type="file" class="form-control" name="grades" id="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload New Letter 1</label>
                                    <input type="file" class="form-control" name="letter1" id="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload New Letter 2</label>
                                    <input type="file" class="form-control" name="letter2" id="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload New KK</label>
                                    <input type="file" class="form-control" name="kk" id="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload New Photo</label>
                                    <input type="file" class="form-control" name="photo" id="">
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-app-layout>
