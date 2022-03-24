<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Developer
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('developers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Photo</label>
                            <input type="file" name="developer_image" id="developer_image" class="form-input rounded-md shadow-sm mt-1 block w-full"/>

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Phone</label>
                            <input type="text" name="phone" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('phone', '') }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Messenger</label>
                            <input type="text" name="messenger" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('messenger', '') }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', '') }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Social Media</label>
                            <input type="text" name="social_media" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('social_media', '') }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Location</label>
                            <input type="text" name="location" id="location" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('location', '') }}" />

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Price</label>
                            <input step=".01" type="number" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('price', '') }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Price Per/Hour</label>
                            <input step=".01" type="number" name="price_per_hour" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('price_per_hour', '') }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">English Level</label>
                            <select name="english_level" id="" class="form-control">
                                <option value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">Expert</option>
                            </select>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Age</label>
                            <input min="18" max="99" type="number" name="age" id="age" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('age', '') }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Experience</label>
                            <input min="0" max="99" type="number" name="experience" id="experience" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('experience', '') }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Working Type</label>
                            Full-Time <input type="radio" name="working_type" id="price" class="form-radio rounded-md shadow-sm mt-1 block"
                                   value="1" />
                            Part-Time <input type="radio" name="working_type" id="price" class="form-radio rounded-md shadow-sm mt-1 block "
                                             value="2" />
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
