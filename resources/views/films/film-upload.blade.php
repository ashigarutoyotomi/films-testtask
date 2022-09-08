<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="{{route('films.store')}}">
        {{csrf_field()}}
        <input type="file" name="poster" required>
        <input type="text" name="name" placeholder="Film name">
        <select name="genre_ids" required multiple>
            @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
        </select>
        <input type="submit" name="upload" value="upload">
    </form>
</body>

</html>