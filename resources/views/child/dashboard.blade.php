@extends('parent.app')

@section('content')
<div class="container">
    <!-- CREATE -->
    <a class="btn btn-primary" href="{{ route('vehicle.create') }}">Create Vehicle</a>

    <!-- READ -->
    <div class="table">
        <table id="vehicles-table">
            <thead>
                <th>Name</th>
                <th>Plate Number</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->plate_number }}</td>
                        <td>
                             <!-- UPDATE -->
                            <a class="btn btn-success" href="{{ route('vehicle.edit', $vehicle->id) }}">Update</a>

                             <!-- DELETE -->
                            <a class="btn btn-danger" href="{{ route('vehicle.delete', $vehicle->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   

</div>
    
@endsection

@section('script')
    <script>
        $('#vehicles-table').DataTable();
    </script>
@endsection