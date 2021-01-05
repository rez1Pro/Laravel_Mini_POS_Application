<x-card head="Sales Details">
            <table class="table table-bordered text-center" id="dataTable-sale" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@if(Auth::user()->id == 1)Admin @else Name @endif</th>
                    <th>Challan-No</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th style="width:10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                    @foreach ($user->sales as $sale)
                @if(Auth::user()->id != 1)
                        @if (Auth::user()->id === $sale->admin_id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $sale->admin->id === 1 ? $sale->admin->name : $sale->admin->name }}</td>
                                <td>{{ $sale->challan_no }}</td>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->note }}</td>
                                <td>
                                    <form id="delete-form-{{ $sale->id }}"
                                        action="{{ route('sales.destroy', ['id' => $sale->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                            class="form-control btn-circle btn-info"><i class="fa fa-eye"></i>
                                        </a>

                                        <button onclick="return false" data-id="delete-form-{{ $sale->id }}" id="delete"
                                            class="form-control btn-circle btn-danger"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                       @else
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $sale->admin->id === 1 ? $sale->admin->name : $sale->admin->name }}</td>
                                <td>{{ $sale->challan_no }}</td>
                                <td>{{ $sale->date }}</td>
                                <td>{{ $sale->note }}</td>
                                <td>
                                    <form id="delete-form-{{ $sale->id }}"
                                        action="{{ route('sales.destroy', ['id' => $sale->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                            class="form-control btn-circle btn-info"><i class="fa fa-eye"></i>
                                        </a>

                                        <button onclick="return false" data-id="delete-form-{{ $sale->id }}" id="delete"
                                            class="form-control btn-circle btn-danger"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                    @endforeach
                </tbody>
            </table>
</x-card>