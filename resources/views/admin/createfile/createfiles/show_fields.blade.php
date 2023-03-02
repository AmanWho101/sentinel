
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .container{
        padding: 0px 0px 0px 0px;
        height: 600px;
        width: 100%;
        margin: auto;
        

    }
</style>
</head>

<body>
    
    
<div class="container">
    <embed src="{{ asset('file/'.$createfile->path) }}" type="application/pdf" style="width: 100%; height: 200%" />
</div>

</body>
</html>