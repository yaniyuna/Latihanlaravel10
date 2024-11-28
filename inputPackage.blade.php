<x-admin-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    <!-- menampilkan variabel title yang dikirim dari controller-->
        {{$title}}
    </h2>
    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
        <div class="container mx-auto">
            <form enctype='multipart/form-data' action="{{(isset($packages))?route('admin.store', $packages->package_id): route('admin.store')}}" method="POST">
                @CSRF
                @if(isset($packages))@method('PUT')@endif
                <div class="px-2 py-8 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="id" class="block text-sm font-medium text-gray-700">id</label>
                            <input type="text" id="id" name="package_id" placeholder="gunakan angka" required value="{{(isset($packages))?$packages->package_id: old('package_id')}}"class="mt-1 focus: ring-indigo-500 focus: border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('package_id')
                                <div class=" text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="kode" class="block text-sm font-medium text-gray-700">Kode Package</label>
                            <input type="text" id="kode" name="package_code" placeholder="Code Package" required value="{{(isset($packages))?$packages->package_code: old('package_code')}}"class="mt-1 focus: ring-indigo-500 focus: border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('package_code')
                                <div class=" text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Package</label>
                            <input type="text" id="nama" name="package_name" placeholder="Nama Package" required value="{{(isset($packages))?$packages->package_name: old('package_name')}}"class="mt-1 focus: ring-indigo-500 focus: border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('package_name')
                                <div class=" text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="col-span-6 sm:col-span-3">
                            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                            <input type="number" name="nik" id="nik" placeholder="NIK Anggota Tani" required value="{{(isset($petani))?$petani->nik: old('nik')}}"class="mt-1 focus: ring-indigo-500 focus: border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                            @error('nik')
                                <div class=" text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        
                        {{-- <div class="col-span-6 sm:col-span-3">
                            <label for="foto" class="block text-sm font-medium text-gray-700">Photo</label>
                            <input type="file" name="foto" id="foto"class="mt-1 focus: ring-indigo-500 focus: border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('foto')
                                <div class=" text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="col-span-6 sm:col-span-3">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="package_desc" id="deskripsi" cols="30" rows="2"class="mt-1 focus: ring-indigo-500 focus: border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{(isset($packages))?$packages->package_desc:old('package_desc')}} </textarea>
                        </div>
                        {{-- <div class="col-span-6 sm:col-span-3">
                            <label for="author" class="block text-sm font-medium text-gray-700">Kontak Author</label>
                            <input type="text" name="author_id" placeholder="masukkan id author" id="author" value="{{(isset($as))?$authors->author_contact:old('author_contact')}}"class="mt-1 focus: ring-indigo-500 focus: border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('author_id')
                                <div class=" text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="col-span-6 sm:col-span-3">
                            <label for="author" class="block text-sm font-medium text-gray-700">Nama Author</label>
                            <select id="author" name="author_id"class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus: outline-none focus: ring-indigo-500 focus: border-indigo-500 sm:text-sm">
                                <option value="">Pilih Author</option>
                                @foreach ($authors as $item)
                                    <option value="{{$item->author_id}}"{{((isset($packages) && $packages->author_id==$item->author_id) || old('author_id')==$item->author_id)? 'selected': ''}}> {{$item->author_name}}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class=" text-xs text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <input type="radio" checked {{((isset($packages)&&$packages->status=='Y') || old('status')=='Y')?'checked': ''}} name="status" value="Y" class="focus: ring- indigo-500 h-4 w-4 text-indigo-600 border-gray-300 "> Aktif &nbsp; &nbsp;
                            <input type="radio" {{((isset($packages) &&$packages->status=='N') || old('status')=='N')?'checked': ''}} name="status" value="N" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"> 
                            Non Aktif
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-white text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center w-24 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md ring bg-indigo-600 hover:bg-indigo-700 text-white">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>