@extends('parent.app')

@section('content')

    @include('includes.errors')
    <form id="create-vehicle-form">
        @csrf
        <input type="text" name="vehicle_name" placeholder="Vehicle name">
        <input type="text" name="plate_number" placeholder="Plate number">
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>

@endsection

@section('script')
<script>
    
    $('#create-vehicle-form').on('submit', function(e){
        e.preventDefault(); //HINDI MAG REREFRESH YUNG PAGE

        var inputs = $('#create-vehicle-form').serializeArray();

        $.ajax({
            type: "POST",
            url: "{{ route('vehicle.add') }}",
            data: inputs,
            success: function(response) {
                Swal.fire({
                    title: 'Success',
                    text: response.message,
                    icon: 'success'
                }).then((result) => {
                    location.reload(); //REFRESH PAGE
                })
            },
            error: function(response) {
                $('#liveToast').toast('show');
                $('#liveToastTitle').text(response.responseJSON.title + " - " + response.status)
                $('#liveToastContent').empty();
                    
                if(response.status == 422) {
                    //VALIDATION ERROR
                    $.each(response.responseJSON.errors, function (key, item) 
                    {
                        $('#liveToastContent').append("<li>"+item+"</li>")
                    });
                }
                else { 
                    $('#liveToastContent').append("<li>"+response.responseJSON.errors+"</li>")
                }
            }
        })

    })
    
</script>
@endsection