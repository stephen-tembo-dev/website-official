<div>
    <div class="container">
        <table class="highlight striped responsive-table mt">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Preview</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $key => $story)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$story->title}}</td>
                    <td><img class="materialboxed" width="80px" height="50px" src="{{ asset('/storage/uploads/' . $story->image_path) }}" alt=""></td>
                    <td><a href="/edit-news-story/{{$story->id}}" class="btn btn-floating btn-small white"><i class="material-icons black-text">edit</i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>