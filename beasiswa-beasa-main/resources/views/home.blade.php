<x-app-layout>
<head><title>Bea|Sa</title></head>
    <x-slot name="header">
        <form action="{{ route('search') }}" method="get">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Home</h3>
                    <p class="text-subtitle text-muted">This is the main page.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <select class="form-control" id="" name="domicile">
                            <option value="">-- Select Domicile --</option>
                            @if (isset($_GET['domicile']))
                                <option value="Nasional" {{ $_GET['domicile'] == 'Nasional' ? 'selected' : '' }}>
                                    Nasional</option>
                                <option value="Internasional"
                                    {{ $_GET['domicile'] == 'Internasional' ? 'selected' : '' }}>Internasional
                                </option>
                            @else
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <select class="form-control" id="" name="strata">
                            <option value="">-- Select Strata --</option>
                            @if (isset($_GET['strata']))
                                <option value="S1" {{ $_GET['strata'] == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ $_GET['strata'] == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ $_GET['strata'] == 'S3' ? 'selected' : '' }}>S3</option>
                            @else
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <select class="form-control" id="" name="type">
                            <option value="">-- Select Type --</option>
                            @if (isset($_GET['type']))
                                <option value="Full" {{ $_GET['type'] == 'Full' ? 'selected' : '' }}>Full</option>
                                <option value="Partial" {{ $_GET['type'] == 'Partial' ? 'selected' : '' }}>Partial
                                </option>
                            @else
                                <option value="Full">Full</option>
                                <option value="Partial">Partial</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search"
                            value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
        @if (count($scholarship) > 0)
            <div class="row">
                @foreach ($scholarship as $sc)
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $sc->cover }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sc->title }}</h5>
                                <p class="card-text">{{ substr($sc->description, 0, 200) }}</p>
                                <a href="{{ route('detail', $sc->id) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No Data</p>
        @endif
    </section>
</x-app-layout>
