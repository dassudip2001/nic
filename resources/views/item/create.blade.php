<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Item Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- main --}}
            <div class="card">
                <div class="card-title">

                    <!-- Button trigger modal -->
                    <button type="button" style="color:aqua" class="btn btn-primary float-end mt-1 mx-1"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add New Item
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Item </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="itemName" class="form-label">Item Name
                                            </label>
                                            <input type="text" class="form-control" name="itemName" id="itemName"
                                                placeholder="Enter The Item Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="itemCode" class="form-label">Item Name
                                            </label>
                                            <input type="text" class="form-control" name="itemCode" id="itemCode"
                                                placeholder="Enter The Item Code">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Item Group
                                                Select Item Group
                                            </label>
                                            <select name="itemGroupId" class="form-select"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                @foreach ($imGroup as $ig)
                                                    <option value="{{ $ig->id }}">{{ $ig->itemGroupName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Item Group
                                                Description
                                            </label>
                                            <textarea class="form-control" name="itemDescription" id="itemDescription" rows="3"></textarea>
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="color:aqua" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" style="color: orchid"
                                            class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="fs-4 mt-2 mx-2">
                        Item Group
                        <hr>
                    </div>
                    <div class="card-body ">
                        <table class="table table-primary ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Code</th>
                                    <th scope="col">Item Describption</th>

                                    <th scope="col">More</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($im as $itm)
                                    <tr>
                                        <th scope="row">{{ $itm->id }}</th>
                                        <td>{{ $itm->itemName }}</td>
                                        <td>{{ $itm->itemCode }}</td>
                                        <td>{{ $itm->itemDescription }}</td>
                                        <td>

                                            <a href="{{ url('/item/edit', $itm->id) }}">Edit</a>

                                            <a href="{{ url('/item/delete', $itm->id) }}">Delete</a>
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
</x-app-layout>
