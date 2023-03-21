<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <div class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
            {{ __('Profile Information') }}
           </div>


    </x-slot>
    <x-slot name="description">

        {{ __('Update your account\'s profile information and email address.') }}


    </x-slot>

    <x-slot name="form">

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 bg-white rounded-md dark:bg-darker">
            <!-- Profile Photo File Input -->

            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].firstname;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                            <x-jet-label for="photo" class="dark:text-primary" value="{{ __('Photo') }}" />

          <!-- Current Profile Photo -->
          <div class="mt-2" x-show="! photoPreview">
            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->first_name }}" class="rounded-full h-20 w-20 object-cover">
        </div>

              <!-- New Profile Photo Preview -->
              <div class="mt-2" x-show="photoPreview">
                <span class="block rounded-full w-20 h-20" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-primary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-primary-button>

            @if ($this->user->profile_photo_path)
            <x-primary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-primary-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4 bg-white rounded-md dark:bg-darker">
            <x-jet-label for="first_name"  value="{{ __('Primer Nombre') }}" />
            <x-jet-input id="first_name" type="text" class="mt-1 block w-full text-gray-500 uppercase dark:text-primary-light" wire:model.defer="state.first_name" autocomplete="first_name" required />
            <x-jet-input-error for="first_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 bg-white rounded-md dark:bg-darker">
            <x-jet-label for="second_name"  value="{{ __('Segundo Nombre') }}" />
            <x-jet-input id="second_name"  type="text" class="mt-1 block w-full text-gray-500 uppercase dark:text-primary-light" wire:model.defer="state.second_name" autocomplete="second_name" />
            <x-jet-input-error for="second_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 bg-white rounded-md dark:bg-darker">
            <x-jet-label for="first_last_name" value="{{ __('Apellido Paterno') }}" />
            <x-jet-input id="first_last_name" class="mt-1 block w-full text-gray-500 uppercase dark:text-primary-light" type="text"  wire:model.defer="state.first_last_name" autocomplete="first_last_name" required />
            <x-jet-input-error for="first_last_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 bg-white rounded-md dark:bg-darker">
            <x-jet-label for="second_last_name"  value="{{ __('Apellido Materno') }}" />
            <x-jet-input id="second_last_name" class="mt-1 block w-full text-gray-500 uppercase dark:text-primary-light" type="text" wire:model.defer="state.second_last_name" autocomplete="second_last_name" required />
            <x-jet-input-error for="second_last_name" class="mt-2" />
        </div>


        <div class="col-span-6 sm:col-span-4 bg-white rounded-md dark:bg-darker">
            <x-jet-label for="email" class="dark:text-gray-400" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-primary-button  wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-primary-button>
    </x-slot>

</x-jet-form-section>
