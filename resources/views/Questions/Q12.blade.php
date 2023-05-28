@extends('inc.layout')
@section('title')
    12
@endsection
@section('main')
    <h1>Question 12:</h1>
    <ul id="titles">

    </ul>



@section('scripts')
    <script>
        var URL = 'https://jsonplaceholder.typicode.com/posts';

        axios.get(URL)
            .then(function(response) {
                var posts = response.data;
                var titles = $('#titles');

                for (var i = 0; i < posts.length; i++) {
                    var post = posts[i];
                    var title = post.title;
                    var li = $('<li>').text(title);
                    titles.append(li);
                }
            }).catch(function(error) {
                console.log(error);
                alert('Something is wrong please try again..!')
            });
    </script>
@endsection

@endsection
