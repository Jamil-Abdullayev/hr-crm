<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Developers List
        </h2>
    </x-slot>

    <div>
        <div style="padding-top: 3%;" class="">
            <div class="row">
                <div class="col-md-9">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full">
                                        <thead>
                                        <tr>
                                            <th scope="col" width="50"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Photo
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Messenger
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Social Media
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Skills
                                            </th>
                                            <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $item->id }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <img src="images/{{$item->developer_image}}" alt="">
                                                </td>


                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $item->name }}
                                                </td>


                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <a href="{{ $item->messenger }}">{{ $item->messenger }}</a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <a href="{{ $item->social_media }}">{{ $item->social_media }}</a>
                                                </td>
                                                <td>
                                                    @php
                                                        $skill_string='';
                                                        foreach($item->skills as $skill)
                                                        {
                                                           $skill_string.=$skill->name.',';
                                                        }
                                                       echo substr($skill_string,0,-1);
                                                    @endphp
                                                </td>
                                                <td>
                                                    <a href="{{ route('developers.show', $item->id) }}" style="color:white;" class="btn blue">Show More</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <h4>
                        Search
                    </h4>

                    <form action="{{route('search')}}" method="post">
                        @csrf
                        @if(!empty($selectedData))
                            <div class=" form">
                                <div class="form-group">
                                    <label for="">Skills</label>
                                    <select class="form-control select2" name="skills[]" multiple>
                                        @foreach($skills as $item)
                                            @php

                                                if(!empty($selectedData['skills'])){
                                                    if(in_array($item->id,$selectedData['skills'])) {
                                                        $selected='selected';
                                                    }
                                                    else {
                                                            $selected='';
                                                        }
                                                    }else
                                                        {
                                                            $selected='';
                                                        }
                                            @endphp
                                            <option {{$selected}} value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Price Type:</label>
                                    <br>
                                    <label for="pt1">Monthly&nbsp;</label><input onchange="checkRadioButton()" id="pt1" type="radio"
                                                                                 value="1">
                                    <br>
                                    <label for="pt2">Per/Hour&nbsp;</label><input onchange="checkRadioButton()" id="pt2" type="radio"
                                                                                  value="2">
                                </div>

                                <script>
                                    function checkRadioButton()
                                    {
                                        if(document.getElementById('pt1').checked) {
                                            document.getElementById('ph1').disabled=true;
                                            document.getElementById('ph2').disabled=true;
                                            document.getElementById('range_ph').disabled=true;
                                        }
                                        else{
                                            document.getElementById('ph1').disabled=false;
                                            document.getElementById('ph2').disabled=false;
                                            document.getElementById('range_ph').disabled=false;
                                        }
                                        if(document.getElementById('pt2').checked) {
                                            document.getElementById('pm1').disabled=true;
                                            document.getElementById('pm2').disabled=true;
                                            document.getElementById('range_pm').disabled=true;
                                        }
                                        else{
                                            document.getElementById('pm1').disabled=false;
                                            document.getElementById('pm2').disabled=false;
                                            document.getElementById('range_pm').disabled=false;
                                        }
                                    }
                                </script>


                                <div class="form-group">
                                    <label for="">Price Monthly</label>

                                    <div class="sliderCont">
                                        <div  id="range_pm"></div>
                                    </div>

                                    <div class="flex">
                                        <input id="pm1" step=".01" type="hidden" class="form-control" name="price_min" value="">
                                        <input id="pm2" step=".01" type="hidden" class="form-control" name="price_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Price Per/Hour</label>
                                    <div class="sliderCont">
                                        <div  id="range_ph"></div>
                                    </div>

                                    <div class="flex">
                                        <input  id="ph1" step=".01" type="hidden" class="form-control" name="price_per_hour_min" value="">

                                        <input  id="ph2" step=".01" type="hidden" class="form-control" name="price_per_hour_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Language(English):</label>
                                    <select class="form-control select" name="english_level" id="">
                                        <option  value="">-</option>
                                        <option @if($selectedData->english_level==1) selected @endif value="1">Low</option>
                                        <option @if($selectedData->english_level==2) selected @endif value="2">Medium</option>
                                        <option @if($selectedData->english_level==3) selected @endif value="3">Expert</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Experience:</label>
                                    <div class="sliderCont">
                                        <div  id="range_exp"></div>
                                    </div>
                                    <div class="flex">
                                        <input id="exp1" class="form-control" type="hidden" name="exp_min" value="">

                                        <input id="exp2" class="form-control" type="hidden" name="exp_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Age Range:</label>
                                    <div class="sliderCont">
                                        <div  id="range_age"></div>
                                    </div>
                                    <div class="flex">
                                        <input id="age1" class="form-control" type="hidden" name="age_min" value="">

                                        <input id="age2" class="form-control" type="hidden" name="age_max" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="">Working Type:</label>
                                    <br>
                                    <label for="wt1">Full-Time&nbsp;</label><input @if($selectedData->working_type==1) checked @endif  checked id="wt1" type="radio" name="working_type"
                                                                                   value="1">
                                    <br>
                                    <label for="wt2">Part-Time&nbsp;</label><input @if($selectedData->working_type==2) checked @endif  id="wt2" type="radio" name="working_type"
                                                                                   value="2">
                                </div>
                                <div class="form-group">
                                    <button style="margin-top:10%;" class="btn blue form-control">
                                        <span style="color:white;">Submit</span>
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="form">
                                <div class="form-group">

                                    <label for="">Skills</label>
                                    <select class="form-control select2" name="skills[]" multiple>
                                        @foreach($skills as $item)

                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Price Type:</label>
                                    <br>
                                    <label for="pt1">Monthly&nbsp;</label><input name="price_type" onchange="checkRadioButton()" id="pt1" type="radio"
                                                                                 value="1">
                                    <br>
                                    <label for="pt2">Per/Hour&nbsp;</label><input name="price_type" onchange="checkRadioButton()" id="pt2" type="radio"
                                                                                  value="2">
                                </div>

                                <script>
                                    function checkRadioButton()
                                    {
                                        if(document.getElementById('pt1').checked) {
                                            document.getElementById('ph1').disabled=true;
                                            document.getElementById('ph2').disabled=true;
                                            document.getElementById('range_ph').disabled=true;
                                        }
                                        else{
                                            document.getElementById('ph1').disabled=false;
                                            document.getElementById('ph2').disabled=false;
                                            document.getElementById('range_ph').disabled=false;
                                        }
                                        if(document.getElementById('pt2').checked) {
                                            document.getElementById('pm1').disabled=true;
                                            document.getElementById('pm2').disabled=true;
                                            document.getElementById('range_pm').disabled=true;
                                        }
                                        else{
                                            document.getElementById('pm1').disabled=false;
                                            document.getElementById('pm2').disabled=false;
                                            document.getElementById('range_pm').disabled=false;
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                    <label for="">Price Monthly</label>

                                    <div class="sliderCont">
                                        <div  id="range_pm"></div>
                                    </div>

                                    <div class="flex">
                                        <input id="pm1" step=".01" type="hidden" class="form-control" name="price_min" value="">
                                        <input id="pm2" step=".01" type="hidden" class="form-control" name="price_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Price Per/Hour</label>
                                    <div class="sliderCont">
                                        <div  id="range_ph"></div>
                                    </div>

                                    <div class="flex">
                                         <input  id="ph1" step=".01" type="hidden" class="form-control" name="price_per_hour_min" value="">

                                         <input  id="ph2" step=".01" type="hidden" class="form-control" name="price_per_hour_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Language(English):</label>
                                    <select class="form-control select" name="english_level" id="">
                                        <option selected value="">-</option>
                                        <option  value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Expert</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Experience:</label>
                                    <div class="sliderCont">
                                        <div  id="range_exp"></div>
                                    </div>
                                    <div class="flex">
                                         <input id="exp1" class="form-control" type="hidden" name="exp_min" value="">

                                        <input id="exp2" class="form-control" type="hidden" name="exp_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Age Range:</label>
                                    <div class="sliderCont">
                                        <div  id="range_age"></div>
                                    </div>
                                    <div class="flex">
                                       <input id="age1" class="form-control" type="hidden" name="age_min" value="">

                                        <input id="age2" class="form-control" type="hidden" name="age_max" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="">Working Type:</label>
                                    <br>
                                    <label for="wt1">Full-Time&nbsp;</label><input class="with-gap" checked id="wt1" type="radio" name="working_type"
                                                                                   value="1">
                                    <br>
                                    <label for="wt2">Part-Time&nbsp;</label><input class="with-gap"  id="wt2" type="radio" name="working_type"
                                                                                   value="2">
                                </div>
                                <div class="form-group">
                                    <button style="margin-top:10%;" class="btn blue form-control">
                                        <span style="color:white;">Submit</span>
                                    </button>
                                </div>
</div>
                        @endif
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
                    </form>

                </div>
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
<script>
    var slider = document.getElementById('range_pm');

    noUiSlider.create(slider, {
        start: [ 1000, 8000 ], // Handle start position
        step: 1, // Slider moves in increments of '10'
        margin: 10, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 10000
        }
    });

    var minCostInput = document.getElementById('pm1'),
        maxCostInput = document.getElementById('pm2');

    // When the slider value changes, update the input and span
    slider.noUiSlider.on('update', function( values, handle ) {
        if ( handle ) {
            maxCostInput.value = values[handle];
        } else {
            minCostInput.value = values[handle];
        }
    });

    minCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });

    maxCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });
    ///////////////price per month////////////////


    var slider = document.getElementById('range_ph');

    noUiSlider.create(slider, {
        start: [ 20, 80 ], // Handle start position
        step: 1, // Slider moves in increments of '10'
        margin: 10, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 100
        }
    });

    var minCostInput = document.getElementById('ph1'),
        maxCostInput = document.getElementById('ph2');

    // When the slider value changes, update the input and span
    slider.noUiSlider.on('update', function( values, handle ) {
        if ( handle ) {
            maxCostInput.value = values[handle];
        } else {
            minCostInput.value = values[handle];
        }
    });

    minCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });

    maxCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });
    ///////////////price per hour////////////////

    var slider = document.getElementById('range_exp');

    noUiSlider.create(slider, {
        start: [ 1, 10 ], // Handle start position
        step: 1, // Slider moves in increments of '10'
        margin: 10, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 50
        }
    });

    var minCostInput = document.getElementById('exp1'),
        maxCostInput = document.getElementById('exp2');

    // When the slider value changes, update the input and span
    slider.noUiSlider.on('update', function( values, handle ) {
        if ( handle ) {
            maxCostInput.value = values[handle];
        } else {
            minCostInput.value = values[handle];
        }
    });

    minCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });

    maxCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });
    ///////////////exp////////////////


    var slider = document.getElementById('range_age');

    noUiSlider.create(slider, {
        start: [ 20, 80 ], // Handle start position
        step: 1, // Slider moves in increments of '10'
        margin: 10, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 100
        }
    });

    var minCostInput = document.getElementById('age1'),
        maxCostInput = document.getElementById('age2');

    // When the slider value changes, update the input and span
    slider.noUiSlider.on('update', function( values, handle ) {
        if ( handle ) {
            maxCostInput.value = values[handle];
        } else {
            minCostInput.value = values[handle];
        }
    });

    minCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });

    maxCostInput.addEventListener('change', function(){
        slider.noUiSlider.set([null, this.value]);
    });
    ///////////////age////////////////
</script>
