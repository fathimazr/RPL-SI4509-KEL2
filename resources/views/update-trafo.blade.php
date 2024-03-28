<!DOCTYPE html>
<html>
<head>
    <title>Update Trafo Performance</title>
</head>
<body>
    <h1>Update Trafo Performance Data</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('trafo.update') }}">
        @csrf

        <div class="form-group">
            <label for="voltage">Voltage (V):</label>
            <input type="number" class="form-control" id="voltage" name="voltage" value="{{ old('voltage') }}">
        </div>

        <div class="form-group">
            <label for="current">Current (A):</label>
            <input type="number" class="form-control" id="current" name="current" value="{{ old('current') }}">
        </div>

        <div class="form-group">
            <label for="temperature">Temperature (°C):</label>
            <input type="number" class="form-control" id="temperature" name="temperature" value="{{ old('temperature') }}">
        </div>

        <div class="form-group">
            <label for="blackout_status">Blackout Status:</label>
            <select class="form-control" id="blackout_status" name="blackout_status">
                <option value="0" {{ (old('blackout_status') == 0 ? 'selected' : '') }}>Normal</option>
                <option value="1" {{ (old('blackout_status') == 1 ? 'selected' : '') }}>Blackout</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('trafo.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>
