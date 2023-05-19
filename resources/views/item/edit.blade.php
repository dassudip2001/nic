<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- main --}}
            <div class="card">
                <div class="fs-4 mx-3">
                    Edit Item Page
                    <hr>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="itemName" class="form-label">Item Name
                                </label>
                                <input type="text" class="form-control" value="{{ $im->itemName }}" name="itemName"
                                    id="itemName" placeholder="Enter The Item Name">
                            </div>
                            <div class="mb-3">
                                <label for="itemCode" class="form-label">Item Name
                                </label>
                                <input type="text" class="form-control" name="itemCode" value="{{ $im->itemCode }}"
                                    id="itemCode" placeholder="Enter The Item Code">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Item Group
                                    Select Item Group
                                </label>
                                <select name="itemGroupId" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($imgroup as $ig)
                                        <option value="{{ $ig->id }}">{{ $ig->itemGroupName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Item Group
                                    Description
                                </label>
                                <textarea class="form-control" name="itemDescription" id="itemDescription" rows="3">{{ $im->itemDescription }}</textarea>
                            </div>



                        </div>

                        <button type="submit" style="color: orchid" class="btn btn-primary float-end">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
