<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Registrant</h3>
                <p class="text-subtitle text-muted">All registrant signed this scholarship</p>
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
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @if (count($registrant) > 0)
                        <?php $count = 1; ?>
                        @foreach ($registrant as $sc)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $sc->name }}</td>
                                <td>{{ $sc->email }}</td>
                                <td>{{ $sc->phone_number }}</td>
                                <td>{{ $sc->status }}</td>
                                <td>
                                    <a href="{{ route('scholarship.registrant.detail', [$scholarship_id, $sc->id]) }}"
                                        class="btn btn-success">Detail</a>
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
