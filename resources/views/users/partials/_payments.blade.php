{{-- @foreach ($errors as $error)
    <div class="alert-danger font-italic">{{ $error }}</div>
@endforeach --}}
<div class="shadow card border-dark">
    <div class="card-header bg-info success text-light text-center">
        <h4>Payments Details</h4>
    </div>
    <div class="table-responsive container mt-2 mb-2" style="font-size:15px">
        <table class="table table-bordered text-center" id="dataTable-payment" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@if(Auth::user()->id == 1)Admin @else Name @endif</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th style="width:20%">Action</th>
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('target-id', 'payment')
    @section('modal-title', 'Add a new payment')
    @section('modal-content')
        <div>
            <form action="{{ route('payments.create') }}" method="POST">
                @csrf
                <label for="amount">Amount </label>
                <input type="number" id="amount" placeholder="Amount" class="form-control" name="amount" required>
                <br>
                <label for="date">Date </label>
                <input type="date" id="date" placeholder="date" class="form-control" name="date" required>
                <br>
                <div class="form-group">
                    <label for="note">Note </label>
                    <textarea class="form-control" name="note" id="note" rows="3" required
                        placeholder="Write a short note ......."></textarea>
                </div>
                <input type="hidden" value="{{ $user->id }}" name="user_id">
                <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
                <br>
                <input type="submit" value="Pay Now" class="form-control alert-info">
            </form>
        </div>
    @stop
