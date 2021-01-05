        <form action="{{ $action }}" method="POST">
            @csrf
            <label for="amount">Amount </label>
            <input type="number" id="amount" placeholder="Amount" class="form-control" name="amount" required>
            <br>
            <label for="date">Date </label>
            <input type="date" id="date" placeholder="date" class="form-control" name="date" required>
            <br>
            <div class="form-group">
                <label for="note">Note </label>
                <textarea class="form-control" name="note" id="note" rows="3"
                    placeholder="Write a short note ......."></textarea>
            </div>
            <input type="hidden" value="{{ $userId }}" name="user_id">
            <input type="hidden" value="{{ $adminId }}" name="admin_id">
            <br>
            <input type="submit" value="Pay Now" class="form-control alert-info">
        </form>
