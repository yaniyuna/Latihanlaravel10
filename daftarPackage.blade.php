

<x-admin-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$title}}
    </h2>
    <div>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
            <div class="grid grid-cols-12">
                <div class="col-span-6 p-4">
                    <a href="{{ route('admin.create') }}">
                        <button class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple- 200 hover: text-white hover:bg-purple-600 hover:border-transparent focus: outline-none">Tambah</button>
                    </a>
                    <button class="px-4 py-1 text-sm rounded text-green-600 font-semibold border border-green-200 hover: text-white hover:bg-green-600 hover:border-transparent focus:outline-none">Publish</button>
                    <button class="px-4 py-1 text-sm rounded text-red-600 font-semibold border border-red-200 hover: text-white hover:bg-red-600 hover:border-transparent focus:outline-none">Delete</button>
                </div>
                <div class="col-span-6 p-4 flex justify-end">
                    <input type="text" class="px-4 py-2 focus: ring-indigo-500 focus: border-indigo-500 rounded-none rounded-1-md sm:text-sm border-gray-300">
                    <button class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover: text-white hover:bg-blue-600">Cari</button>
                </div>
            </div>
            
            <div class="py-2 align-middle inline-block min-w-full sm:px-4 1g:px-4">
                <div class="shadow overflow-hidden border-b border-gray-200 sm: rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray- 500 uppercase tracking-wider"> 
                                    Checklist
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray- 500 uppercase tracking-wider">  
                                    Kode Package
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray- 500 uppercase tracking-wider">  
                                    Nama Package
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray- 500 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray- 500 uppercase tracking-wider">
                                    Nama Author
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray- 500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($packages as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"> 
                                    {{-- {{ $item->author->author_name }} --}}
                                    <div class="flex items-center"><input type="checkbox" name="" id="">
                                        {{-- <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="{{asset($item->foto)}}" alt="">
                                        </div> --}}
                                        <div class="ml-4">
                                            {{-- <td>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$item->author_id}}
                                                </div>
                                            </td> --}}
                                            <td>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$item->package_code}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="text-sm text-gray-500">
                                                    {{$item->package_name}}
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="text-sm text-gray-500">
                                                    {{$item->package_desc}}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="text-sm text-gray-500">
                                                    {{$item->author->author_name}}
                                                </div>
                                            </td>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="{{route('admin.destroy', $item->package_id)}}" method="POST">
                                            @csrf @method('DELETE')
                                            <a href="{{route('admin.edit', $item->package_id)}}" class="text-violet-600 hover: text-violet-900">Edit</a>
                                        <button class="text-red-600 hover: text-red-900"onclick="return confirm('Anda Yakin?')"type="submit">Del</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="m-4">{{ $packages->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>