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
                                                Phone
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
                                                    {{ $item->phone }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $item->messenger }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $item->email }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $item->social_media }}
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
                        @if(!empty($selecedData))
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
                                    <label for="wt1">Monthly&nbsp;</label><input onchange="checkRadioButton()" id="pt1" type="radio"
                                                                                 value="1">
                                    <br>
                                    <label for="wt2">Per/Hour&nbsp;</label><input onchange="checkRadioButton()" id="pt2" type="radio"
                                                                                  value="2">
                                </div>

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

                                <div class="form-group">
                                    <label for="">Price Monthly</label>
                                    <div class="flex">
                                        <label for="pm1">max:</label> <input id="pm1" step=".01" type="number" class="form-control" name="price_min" value="{{$selectedData->price_min}}">

                                        <label for="pm1">min:</label>  <input id="pm2" step=".01" type="number" class="form-control" name="price_max" value="{{$selectedData->price_max}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Price Per/Hour</label>
                                    <div class="flex">
                                        <label for="ph1">max:</label>  <input id="ph1" step=".01" type="number" class="form-control" name="price_per_hour_min" value="{{$selectedData->price_per_hour_min}}">

                                        <label for="ph2">min:</label> <input id="ph2" step=".01" type="number" class="form-control" name="price_per_hour_max" value="{{$selectedData->price_per_hour_max}}">
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
                                    <div class="flex">
                                        <label for="exp1">max:</label>    <input id="exp1" class="form-control" type="number" name="exp_min" value="{{$selectedData->exp_min}}">

                                        <label for="exp2">min:</label>     <input id="exp2" class="form-control" type="number" name="exp_max" value="{{$selectedData->exp_max}}">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="">Age Range:</label>
                                    <div class="flex">
                                        <label for="age1">max:</label>  <input id="age1" class="form-control" type="number" name="age_min" value="{{$selectedData->age_min}}">

                                        <label for="age2">max:</label>   <input id="age2" class="form-control" type="number" name="age_max" value="{{$selectedData->age_max}}">
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

                                <div class="form-group">
                                    <label for="">Price Monthly</label>
                                    <div class="flex">
                                        <label for="pm1">max:</label> <input id="pm1" step=".01" type="number" class="form-control" name="price_min" value="">

                                        <label for="pm2">min:</label> <input id="pm2" step=".01" type="number" class="form-control" name="price_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Price Per/Hour</label>
                                    <div class="flex">
                                        <label for="ph1">max:</label>  <input id="ph1" step=".01" type="number" class="form-control" name="price_per_hour_min" value="">

                                        <label for="ph2">min:</label>  <input id="ph2" step=".01" type="number" class="form-control" name="price_per_hour_max" value="">
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
                                    <div class="flex">
                                        <label for="exp1">max:</label>  <input id="exp1" class="form-control" type="number" name="exp_min" value="">

                                        <label for="exp2">min:</label> <input id="exp2" class="form-control" type="number" name="exp_max" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Age Range:</label>
                                    <div class="flex">
                                        <label for="age1">max:</label> <input id="age1" class="form-control" type="number" name="age_min" value="">

                                        <label for="age2">min:</label>  <input id="age2" class="form-control" type="number" name="age_max" value="">
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
