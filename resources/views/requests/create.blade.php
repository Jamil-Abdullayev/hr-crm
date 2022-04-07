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
                            <label for=""  class="block font-medium text-sm text-gray-700">Price Type:</label>
                            <br>
                            <label for="pt1">Monthly&nbsp;</label><input name="pr_type" onchange="checkRadioButton()" id="pt1" type="radio"
                                                                         value="1">
                            <br>
                            <label for="pt2">Per/Hour&nbsp;</label><input name="pr_type" onchange="checkRadioButton()" id="pt2" type="radio"
                                                                          value="2">
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">

                            <label class="block font-medium text-sm text-gray-700" for="">Price Monthly</label>
                            <div class="flex">
                                <input id="pm1" step=".01" type="number" class="form-control" name="price_min" value="">
                                -
                                <input id="pm2" step=".01" type="number" class="form-control" name="price_max" value="">
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for=""  class="block font-medium text-sm text-gray-700">Price Per/Hour</label>
                            <div class="flex">
                                <input id="ph1" step=".01" type="number" class="form-control" name="price_per_hour_min" value="">
                                -
                                <input id="ph2" step=".01" type="number" class="form-control" name="price_per_hour_max" value="">
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for=""  class="block font-medium text-sm text-gray-700">Language(English):</label>
                            <select class="form-control select" name="english_level" id="">
                                <option selected value="">-</option>
                                <option value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">Expert</option>
                            </select>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label  class="block font-medium text-sm text-gray-700" for="">Experience:</label>
                            <div class="flex">
                                <input class="form-control" type="number" name="exp_min" value="">
                                -
                                <input class="form-control" type="number" name="exp_max" value="">
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label  class="block font-medium text-sm text-gray-700" for="">Age Range:</label>
                            <div class="flex">
                                <input class="form-control" type="number" name="age_min" value="">
                                -
                                <input class="form-control" type="number" name="age_max" value="">
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
                            <label for=""  class="block font-medium text-sm text-gray-700">Working Type:</label>
                            <br>
                            <label for="wt1">Full-Time&nbsp;</label><input id="wt1"  type="radio" name="working_type"
                                                                         value="1">
                            <br>
                            <label for="wt2">Part-Time&nbsp;</label><input id="wt2" type="radio" name="working_type"
                                                                          value="2">
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

<script>
    function checkRadioButton()
    {
        if(document.getElementById('pt1').checked) {
            document.getElementById('ph1').disabled=true;
            document.getElementById('ph2').disabled=true;
        }
        else{
            document.getElementById('ph1').disabled=false;
            document.getElementById('ph2').disabled=false;
        }
        if(document.getElementById('pt2').checked) {
            document.getElementById('pm1').disabled=true;
            document.getElementById('pm2').disabled=true;
        }
        else{
            document.getElementById('pm1').disabled=false;
            document.getElementById('pm2').disabled=false;
        }
    }
</script>
<style>
    [type="radio"]:not(:checked), [type="radio"]:checked {
        position: relative;
        opacity: 1;
    }

</style>
