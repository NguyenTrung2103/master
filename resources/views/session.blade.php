<!DOCTYPE html>
<html>
<head>
    <title>Country</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>

<body>
<div class="container">
    <h1>Country</h1>

    <form method="" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Select Country:</label>
            <select class="form-control" name="country">
                <option value="">---</option>
                @foreach($countries as $country)
                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Select City:</label>
            <select class="form-control" name="city">
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </form>

</div>

<script type="text/javascript">
    var url = "{{ url('/showCitiesInCountry') }}";
    $("select[name='country']").change(function(){
        var country_code = $(this).val();
        var token = $("input[name='_token']").val();
        console.log(country_code);
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                country_code: country_code,
                _token: token
            },
            success: function(data) {
                console.log(data);
                $("select[name='city'").html('');
                $.each(data, function(key, value){
                    $("select[name='city']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
            }
        });
    });
</script>
</body>
</html>