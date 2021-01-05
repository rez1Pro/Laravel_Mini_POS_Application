<x-card head="Purchase Details">
    <table class="table table-bordered text-center" id="dataTable-purchase" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Challan-No</th>
                <th>Date</th>
                <th>Total</th>
                <th style="width:20%">Action</th>
            </tr>
        </thead>
        <tbody>
            @php($i = 1)
                @foreach ($user->purchases as $purchase)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $purchase->challan_no }}</td>
                        <td>{{ $purchase->date }}</td>
                        <td>{{ $purchase->total }}</td>
                        <td>
                            <form id="delete-form-{{ $purchase->id }}"
                                action="{{ route('purchases.destroy', ['id' => $purchase->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return false" data-id="delete-form-{{ $purchase->id }}" id="delete"
                                    class="form-control btn-circle btn-danger"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
