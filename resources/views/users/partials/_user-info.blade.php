                        <div class="shadow card border-dark mb-3">
                            <div class="card-header bg-info success text-light text-center">
                                <h3>{{ $user->name }}'s Information : </h3>
                            </div>
                            <div class="card-body text-dark">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center">Name : </th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Group :</th>
                                        <td>{{ optional($user->group)->title }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Email :</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Phone :</th>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Address :</th>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
