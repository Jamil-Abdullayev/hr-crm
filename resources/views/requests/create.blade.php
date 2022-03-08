<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Request
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('requests.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-5 bg-white sm:p-6">

                            <label for="name" class="block font-medium text-sm text-gray-700">Company</label>
                            <div wire:ignore>
                                <select name="company" class="form-control select2" id="">
                                    @foreach($companies as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">

                            <label for="name" class="block font-medium text-sm text-gray-700">Price</label>
                            <div wire:ignore>
                                <input type="number" class="form-control" name="price">
                            </div>

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">

                            <label for="name" class="block font-medium text-sm text-gray-700">Skills</label>
                            <div wire:ignore>
                                <select name="skill[]" class="form-control select2" id="" multiple>
                                    @foreach($skills as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>


                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Working Type</label>
                            Full-Time <input type="radio" name="working_type" id="price" class="form-radio rounded-md shadow-sm mt-1 block"
                                             value="1" />
                            Part-Time <input type="radio" name="working_type" id="price" class="form-radio rounded-md shadow-sm mt-1 block "
                                             value="2" />
                        </div>

                        @push('scripts')

                            <script>
                                $(document).ready(function () {
                                    $('.select2').select2();
                                    $('.select2').on('change', function (e) {
                                        var item = $('.select2').select2("val");
                                    });
                                });

                            </script>

                        @endpush
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
