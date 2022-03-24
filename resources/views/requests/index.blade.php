<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Requests List
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            @can('user_access')
            <div class="block mb-8">
                <a href="{{ route('requests.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Request</a>
            </div>
            @endcan
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Company
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Skills
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Working Type
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
                                            {{ $companies[$item->company_id] }}
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
                                            {{$item->price_min}}-{{$item->price_max}} USD
                                        </td>

                                        <td>
                                            @php
                                            if($item->working_type==1)
                                                {
                                                    echo 'Full Time';
                                                }
                                            elseif($item->working_type==2)
                                                {
                                                    echo 'Part Time';
                                                }
                                            @endphp
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @can('user_access')
                                            <a href="{{ route('requests.edit', $item->id) }}" style="color: white;" class="btn btn-warning text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                            <form class="inline-block" action="{{ route('requests.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-danger text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                            </form>
                                            @endcan
                                                <form method="post" action="{{route('search')}}">
                                                    @csrf
                                                    @foreach($item->skills as $skill)
                                                        <input type="hidden" name="skills[]" value="{{$skill->id}}">
                                                    @endforeach
                                                        <input type="hidden" name="price_max" value="{{$item->price_max}}">
                                                        <input type="hidden" name="price_min" value="{{$item->price_min}}">
                                                        <input type="hidden" name="age_min" value="{{$item->age_min}}">
                                                        <input type="hidden" name="age_max" value="{{$item->age_max}}">
                                                        <input type="hidden" name="exp_max" value="{{$item->exp_max}}">
                                                        <input type="hidden" name="exp_min" value="{{$item->exp_min}}">
                                                        <input type="hidden" name="english_level" value="{{$item->english_level}}">
                                                        <input type="hidden" name="price_per_hour_min" value="{{$item->price_per_hour_min}}">
                                                        <input type="hidden" name="price_per_hour_max" value="{{$item->priceper_hour_max}}">
                                                        <input type="hidden" name="working_type" value="{{$item->working_type}}">
                                                        <input type="submit" style="color:white;" class=" btn btn-info text-blue-600 hover:text-blue-900 mb-2 mr-2" value="Search">
                                                </form>
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
    </div>
</x-app-layout>
