<div class="shadow card border-dark">
    <div class="card-header bg-info success text-light text-center">
        <h4>Sales Details</h4>
    </div>
    <div class="table-responsive container mt-2 mb-2" style="font-size:15px">
        <table class="table table-bordered text-center" id="dataTable" cellspacing="0">
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
                    @foreach ($user->sales as $sale)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $sale->challan_no }}</td>
                            <td>{{ $sale->date }}</td>
                            <td>{{ $sale->total }}</td>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>