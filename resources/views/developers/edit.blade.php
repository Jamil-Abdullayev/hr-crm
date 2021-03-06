<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Developer
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" enctype="multipart/form-data" action="{{ route('developers.update', $data->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $data->name) }}" />
                            @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Photo</label>
                            <img  src="/images/{{$data->developer_image}}" alt="">
                            <input type="file" name="developer_image" id="developer_image" class="form-input rounded-md shadow-sm mt-1 block w-full"/>

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Age</label>
                            <input type="text" name="age" id="age" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $data->age) }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Experience</label>
                            <input type="text" name="experience" id="experience" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $data->age) }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('phone', $data->phone) }}" />
                            @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="messenger" class="block font-medium text-sm text-gray-700">Messenger</label>
                            <input type="text" name="messenger" id="messenger" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('messenger', $data->messenger) }}" />
                            @error('messenger')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', $data->email) }}" />
                            @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Social Media</label>
                            <input type="text" name="social_media" id="social_media" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('social_media', $data->social_media) }}" />
                            @error('social_media')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Location</label>
                            <input type="text" name="location" id="location" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('location', $data->location) }}" />

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Price</label>
                            <input step=".01" type="number" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('price', $data->price) }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Price Per/Hour</label>
                            <input step=".01" type="number" name="price_per_hour" id="price_per_hour" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('price', $data->price_per_hour) }}" />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                             <label for="name" class="block font-medium text-sm text-gray-700">English Level</label>
                                <select name="english_level" id="" class="form-control">
                                    <option @if($data->english_level==1) selected @endif value="1">Low</option>
                                    <option @if($data->english_level==2) selected @endif value="2">Medium</option>
                                    <option @if($data->english_level==3) selected @endif value="3">Expert</option>
                                </select>

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="" class="block font-medium text-sm text-gray-700">Working Type</label>
                            <label for="wt1">Full-Time</label> <input type="radio" @php if($data->working_type==1){ echo 'checked'; } @endphp name="working_type" id="wt1" class="form-radio rounded-md shadow-sm mt-1 block"
                                             value="1" />
                            <label for="wt2">Part-Time</label> <input type="radio" @php if($data->working_type==2){ echo 'checked'; } @endphp name="working_type" id="wt2" class="form-radio rounded-md shadow-sm mt-1 block "
                                             value="2" />
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    [type="radio"]:not(:checked), [type="radio"]:checked {
        position: relative;
        opacity: 1;
    }

</style>
