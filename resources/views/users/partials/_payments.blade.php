<x-card head="Payments Details">
            <table class="table table-bordered text-center" id="dataTable-payment" cellspacing="0">
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
                    @foreach ($user->payments as $payment)
                @if(Auth::user()->id != 1)
                        @if (Auth::user()->id === $payment->admin_id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $payment->admin->id === 1 ? $payment->admin->name : $payment->admin->name }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->note }}</td>
                                <td>
                                    <form id="delete-form-{{ $payment->id }}"
                                        action="{{ route('payments.destroy', ['id' => $payment->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                            class="form-control btn-circle btn-info"><i class="fa fa-eye"></i>
                                        </a>

                                        <button onclick="return false" data-id="delete-form-{{ $payment->id }}" id="delete"
                                            class="form-control btn-circle btn-danger"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                        @else
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $payment->admin->id === 1 ? $payment->admin->name : $payment->admin->name }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->note }}</td>
                                <td>
                                    <form id="delete-form-{{ $payment->id }}"
                                        action="{{ route('payments.destroy', ['id' => $payment->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return false" data-id="delete-form-{{ $payment->id }}" id="delete"
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