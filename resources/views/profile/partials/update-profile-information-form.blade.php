<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

   <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div>
        <x-input-label for="first_name" :value="__('First Name')" />
        <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required />
        <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
    </div>

    <div>
        <x-input-label for="last_name" :value="__('Last Name')" />
        <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required />
        <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
    </div>

    <div>
        <x-input-label for="location" :value="__('Location')" />
        <x-text-input id="location" name="location" type="text" :value="old('location', $user->location)" class="block mt-1 w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('location')" />
    </div>

    <div>
        <x-input-label for="about" :value="__('About')" />
        <textarea id="about" name="about" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " rows="4">{{ old('about', $user->about) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('about')" />
    </div>

    <div class="mt-4">
        <x-input-label for="picture" :value="__('Profile Picture')" />
        <input type="file" name="picture" id="picture" class="block mt-1 w-full text-white">
        <x-input-error class="mt-2" :messages="$errors->get('picture')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
</section>
