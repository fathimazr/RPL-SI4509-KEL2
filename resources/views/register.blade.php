<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    </head>
<body>
    <h1>New User Registration</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="employee_id">Employee ID:</label>
            <input type="text" id="employee_id" name="employee_id" value="{{ old('employee_id') }}" required>
        </div>
        <div>
            <button type="submit">Save</button>
            <button type="reset">Cancel</button>
        </div>
    </form>
</body>
</html>
