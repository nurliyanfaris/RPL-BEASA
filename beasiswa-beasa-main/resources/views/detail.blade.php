<x-app-layout>
    <x-slot name="header">
        <img class="card-img-top" src="{{ $scholarship->cover }}" alt="Card image cap">
    </x-slot>
    <section class="section mt-4">
        <div class="row">
            <h5 class="card-title">{{ $scholarship->title }}</h5>
            <p class="card-text">Domicile :{{ $scholarship->domicile }}</p>
            <p class="card-text">Strata : {{ $scholarship->strata }}</p>
            <p class="card-text">Type : {{ $scholarship->type }}</p>
            <p class="card-text">{{ $scholarship->description }}</p>
            <p>Social Media : </p><a href="{{ $scholarship->link }}" class="card-text"><p>{{ $scholarship->link }}</p></a>
            <a href="{{ route('scholarship.signup', $scholarship->id) }}" class="btn btn-primary">Sign Up</a>
        </div>
    </section>
</x-app-layout>
