<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Expenditure Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- main --}}
            <div class="card mt-2 mx-2">
                <div class="fs-4 mx-3">
                    Edit Expenditure
                    <hr>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="expenditure_name" class="form-label">Expenditure Name
                                </label>
                                <input type="text" class="form-control" value="{{ $ex->expenditure_name }}"
                                    name="expenditure_name" id="expenditure_name"
                                    placeholder="Enter The Expenditure Name">
                            </div>
                            <div class="mb-3">
                                <label for="expenditure_type" class="form-label">Expenditure type
                                </label>
                                <input type="text" class="form-control" value="{{ $ex->expenditure_type }}"
                                    name="expenditure_type" id="expenditure_type"
                                    placeholder="Enter The Expenditure Type">
                            </div>
                            <div class="mb-3">
                                <label for="expenditure_amount" class="form-label">Expenditure
                                    Amount
                                </label>
                                <input type="text" class="form-control" value="{{ $ex->expenditure_amount }}"
                                    name="expenditure_amount" id="expenditure_amount"
                                    placeholder="Enter The Expenditure Amount">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Item
                                    Group
                                    Select Item Group
                                </label>
                                <select name="item_id" class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($itemEx as $ig)
                                        <option value="{{ $ig->id }}">{{ $ig->itemName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="color:aqua" class="btn btn-secondary"
                                data-bs-dismiss="modal">Back</button>
                            <button type="submit" style="color: orchid" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
