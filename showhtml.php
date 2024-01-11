<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doucument</title> 
    <script src="js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <input type="button" id="btn" value="CLICK">
    <div id="show_data"></div>
    <table>
        <thead>
            <th>id</th>
            <th>stdid</th>
            <th>stdname</th>
            <th>major</th>
        </thead>
        <tbody>

        </tbody>
    </table>
    <script>
        $('#btn').click(function(){
            /*$("#show_data").text("show data")*/
            $.ajax({
                type:"POST",
                url:"/api/condb.php",
                data: {function: 'getData'},
                dataType:"json",
                success: function(data){
                    var message ='';
                    $.each(data, function(i, k){
                        message += '<tr>';
                        message += '<td>' + k.stdid + '</td>'
                        message += '<td>'+  k.stdname+'</td>'
                        message += '<td>'+  k.email+'</td>'
                        message += '<td>'+  k.telephone+'</td>'
                        message += '</tr>';
                    });

                    $('table tbody').html(message);
                }
            });
        });
    </script>
</body>
</html>