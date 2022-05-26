<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Update Scholarship : {{ $scholarship->title }}</h3>
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

    <form action="{{ route('scholarship.edit.process', $scholarship->id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" id=""
                                    value="{{ $scholarship->title }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Domicile</label>
                                <select name="domicile" id="" class="form-control" required>
                                    <option value="">-- Select Domicile --</option>
                                    <option value="Nasional"
                                        {{ $scholarship->domicile == 'Nasional' ? 'selected' : '' }}>Nasional
                                    </option>
                                    <option value="Internasional"
                                        {{ $scholarship->domicile == 'Internasional' ? 'selected' : '' }}>
                                        Internasional</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Strata</label>
                                <select name="strata" id="" class="form-control" required>
                                    <option value="">-- Select Strata --</option>
                                    <option value="S1" {{ $scholarship->strata == 'S1' ? 'selected' : '' }}>S1
                                    </option>
                                    <option value="S2" {{ $scholarship->strata == 'S2' ? 'selected' : '' }}>S2
                                    </option>
                                    <option value="S3" {{ $scholarship->strata == 'S3' ? 'selected' : '' }}>S3
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type" id="" class="form-control" required>
                                    <option value="">-- Select Type --</option>
                                    <option value="Full" {{ $scholarship->type == 'Full' ? 'selected' : '' }}>Full
                                    </option>
                                    <option value="Partial" {{ $scholarship->type == 'Partial' ? 'selected' : '' }}>
                                        Partial</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"
                                    required>{{ $scholarship->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Existing Cover</label>
                                <div>
                                    <img src="{{ $scholarship->cover }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">New Cover</label>
                                <input type="file" class="form-control" name="cover" id="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type="text" class="form-control" name="link" id=""
                                    value="{{ $scholarship->link }}" required>
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
