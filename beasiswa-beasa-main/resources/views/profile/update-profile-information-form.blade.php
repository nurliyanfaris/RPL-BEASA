<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('Profile Information') }}</h4>
            <p class="card-description">{{ __('Update your account\'s profile information and email address.') }}</p>
        </div>
        <div class="card-body">

            <x-maz-alert class="mr-3" on="saved" color='success'>
                Saved
            </x-maz-alert>
            <form wire:submit.prevent="updateProfileInformation">
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" >
                    <x-maz-input-error for="name" />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <input type="email" name="email " id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" >
                    <x-maz-input-error for="email" />
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                    <input type="text" name="phone_number " id="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" wire:model.defer="state.phone_number" >
                    <x-maz-input-error for="phone_number" />
                </div>

                <!-- Social Media -->
                <div class="form-group">
                    <x-jet-label for="social_media" value="{{ __('Social Media') }}" />
                    <input type="text" name="social_media " id="social_media" class="form-control {{ $errors->has('social_media') ? 'is-invalid' : '' }}" wire:model.defer="state.social_media" >
                    <x-maz-input-error for="social_media" />
                </div>


                <button class="btn btn-primary float-end mt-2"  wire:loading.attr="disabled" wire:target="photo">Save</button>
            </form>
        </div>
    </div>
</section>
