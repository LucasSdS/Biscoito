<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Teste</title>
</head>
<body>
    <form action="{{action('PlanilhaController@enviar')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="file" name="planilha" id="planilha">
        <input type="submit">
    </form>
</body>
</html>