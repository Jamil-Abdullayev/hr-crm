<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Developers List
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <form action="{{route('search')}}" method="post">
                @csrf
                <div class="row mb-3 p-2">
                    <div class="col-md-3">
                        <label for="">Skills</label>
                        <select required class="form-control select2" name="skills[]" multiple>
                            @foreach($skills as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Price</label>
                        <input required step=".01" type="number" class="form-control" name="price" value="">
                    </div>
                    <div class="col-md-3">
                        <label for="">Working Type:</label>
                        <br>
                        <label for="wt1">Full-Time&nbsp;</label><input checked id="wt1" type="radio" name="working_type"
                                                                       value="1">
                        <br>
                        <label for="wt2">Part-Time&nbsp;</label><input id="wt2" type="radio" name="working_type"
                                                                       value="2">
                    </div>
                    <div class="col-md-2">
                        <button style="margin-top:10%;" class="btn btn-success form-control">
                            Submit
                        </button>
                    </div>
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
            </form>


            @can('user_access')
                <div class="block mb-8">
                </div>
            @endcan
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
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">
                                        Skills
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

