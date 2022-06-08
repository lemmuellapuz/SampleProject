<form action="{{ route('vehicle.update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $vehicle->id }}">
    <input type="text" name="vehicle_name" value="{{ $vehicle->name }}" placeholder="Vehicle name">
    <input type="text" name="plate_number" value="{{ $vehicle->plate_number }}" placeholder="Plate number">
    <input type="submit" class="btn btn-primary" value="Update">
</form>