<x-card head="Receipts Details">
            <table class="table table-bordered text-center" id="dataTable-receipt" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@if(Auth::user()->id == 1)Admin @else Name @endif</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th style="width:10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                    @foreach ($user->receipts as $receipt)
                @if(Auth::user()->id != 1)
                        @if (Auth::user()->id === $receipt->admin_id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $receipt->admin->id === 1 ? $receipt->admin->name : $receipt->admin->name }}</td>
                                <td>{{ $receipt->amount }}</td>
                                <td>{{ $receipt->date }}</td>
                                <td>{{ $receipt->note }}</td>
                                <td>
                                    <form id="delete-form-{{ $receipt->id }}"
                                        action="{{ route('receipts.destroy', ['id' => $receipt->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return false" data-id="delete-form-{{ $receipt->id }}" id="delete"
                                            class="form-control btn-circle btn-danger"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                        @else
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $receipt->admin->id === 1 ? $receipt->admin->name : $receipt->admin->name }}</td>
                                <td>{{ $receipt->amount }}</td>
                                <td>{{ $receipt->date }}</td>
                                <td>{{ $receipt->note }}</td>
                                <td>
                                    <form id="delete-form-{{ $receipt->id }}"
                                        action="{{ route('receipts.destroy', ['id' => $receipt->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return false" data-id="delete-form-{{ $receipt->id }}" id="delete"
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