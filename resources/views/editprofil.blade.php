<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page profil') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="relative min-h-screen flex items-center justify-center bg-center py-12 px-4 sm:px-6 lg:px-8 bg-no-repeat bg-cover relative items-center"
         style="
         background-image: url(#);">

        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="grid gap-8 grid-cols-1">
                <div class="flex flex-col ">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold text-lg mr-auto">Modifier mon profil</h2>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>

                    <form method="POST" action="{{ route("update", $user) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                    <div class="mt-5">
                        <div class="form">
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2">Photo<abbr class="hidden" title="required">*</abbr></label>
                                <div class="flex items-center py-6">

                                         <div class="mb-3">
                                            <label for="formFile" class="form-label">Image</label>
                                            <input
                                                class="form-control"
                                                name="photo"
                                                type="file"
                                                value="{{$user->photo}}"
                                                id="formFile">
                                                {{$user->photo}}

                                                <img src="{{asset('imgs/' . $user->photo)}}" class="card-img-top" alt="..." style="height: 50px;width: 50px">
                                        </div>

                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2"> Nom <abbr title="required">*</abbr></label>
                                    <input placeholder="Company Name"
                                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                           type="text"
                                           name="name"
                                           value="{{ old('name', $user->name) }}"
                                           id="name"
                                    >
                                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2">Adresse email <abbr title="required">*</abbr></label>
                                    <input placeholder="Email ID"
                                           class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                           type="text"
                                           name="email"
                                           value="{{ old('email', $user->email) }}"
                                           id="email">
                                    <p class="text-red text-xs hidden">Please fill out this field.</p>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                <label class="font-semibold text-gray-600 py-2">Bio</label>
                                <textarea name="bio" id="bio"
                                          class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4"
                                          placeholder="Enter your comapny info"
                                          spellcheck="false"> {{ old('bio', $user->bio) }} </textarea>
                                @if($errors->has('bio'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bio') }}
                                    </div>
                                @endif
                            </div>

                            {{--
                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('New password')" />

                                <input id="password"
                                         class="block mt-1 w-full"
                                         type="password"
                                         name="password"
                                         autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                <input id="password_confirmation"
                                         class="block mt-1 w-full"
                                         type="password"
                                         name="password_confirmation" />
                            </div>
                            --}}
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100"> Cancel </button>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">Valider</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

</x-app-layout>

