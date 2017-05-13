<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ $post->title }}</title>
    </head>
<style>
    body{
        font-family: "dejavu sans";
    }
    h1{
        text-align: center;
    }
    #left{
        width: 50%;
        float: left;
        text-align: left;
    }
    #right{
        width: 50%;
        float: right;
        text-align: right;
    }
</style>
<body>
    <h1>{{ $post->title }}</h1>

    <div id="left">
        <p>
            <b>Autor:</b> 
            {{ $post->user->name }}
        </p>
    </div>
    
    <div id="right">
        <p>
            <b>Data:</b> 
            {{ $post->created_at }}
        </p>
    </div>

    <div style="clear: both;"></div>

    {!! $post->contents !!}

    <br>Kategorie:
    @foreach($post->categories as $category)
        {{ $category->name }}
        @if(!$loop->last),@endif
    @endforeach  

</body>
</html>