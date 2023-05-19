<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Group Page') }}
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
                        Add New Item Group
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Item Group</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="itemGroupName" class="form-label">Item Name
                                            </label>
                                            <input type="text" class="form-control" name="itemGroupName"
                                                id="itemGroupName" placeholder="Enter The Item Group Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Item Group
                                                Description
                                            </label>
                                            <textarea class="form-control" name="itemGroupDescription" id="itemGroupDescription" rows="3"></textarea>
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
                    <div class="card-body">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">More</th>
                                </tr>
                            </thead>
                            <tbody class="overflow-auto">
                                @foreach ($item as $itm)
                                    <tr>
                                        <th scope="row">{{ $itm->id }}</th>
                                        <td>{{ $itm->itemGroupName }}</td>
                                        <td>{{ $itm->itemGroupDescription }}</td>

                                        <td>
                                            @if (Auth::user()->id === $itm->user_id || Auth::user()->id == '1')
                                                <a href="{{ url('/item-group/edit', $itm->id) }}">Edit</a>
                                            @endif
                                            @if (Auth::user()->id === $itm->user_id || Auth::user()->id == '1')
                                                <a href="{{ url('/item-group/delete', $itm->id) }}">Delete</a>
                                            @endif
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
