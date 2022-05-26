<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Scholarship</h3>
                <p class="text-subtitle text-muted">CRUD Scholarship</p>
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


    <section class="section">

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

        <div class="card">
            <div class="card-header">
                {{-- <h4 class="card-title">Example Content</h4> --}}
                <a href="{{ route('scholarship.create') }}" class="btn btn-primary">New</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Domicile</th>
                        <th>Strata</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    @if (count($scholarship) > 0)
                        <?php $count = 1; ?>
                        @foreach ($scholarship as $sc)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $sc->title }}</td>
                                <td>{{ $sc->domicile }}</td>
                                <td>{{ $sc->strata }}</td>
                                <td>{{ $sc->type }}</td>
                                <td>
                                    <a href="{{ route('scholarship.registrant', $sc->id) }}"
                                        class="btn btn-success">Registrants</a>
                                    <a href="{{ route('scholarship.edit', $sc->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('scholarship.destroy', $sc->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this item')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No Data</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
