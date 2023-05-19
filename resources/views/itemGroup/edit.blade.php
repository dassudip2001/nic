<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item Group') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card mt-2 mx-4">
                <div class="card-title">
                    <div class="fs-4 mx-4">
                        Edit ITem Group
                        <hr>
                    </div>
                    <div class="card-body">

                        {{-- main --}}
                        <form action="" method="post">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="itemGroupName" class="form-label">Item Name
                                    </label>
                                    <input type="text" class="form-control" name="itemGroupName"
                                        value="{{ $item->itemGroupName }}" id="itemGroupName"
                                        placeholder="Enter The Item Group Name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Item Group
                                        Description
                                    </label>
                                    <textarea class="form-control" name="itemGroupDescription" id="itemGroupDescription" rows="3">{{ $item->itemGroupDescription }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="submit" style="color: orchid" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
