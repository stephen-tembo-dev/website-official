<div>
    <div class="container">
        <table class="highlight striped responsive-table mt">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $index => $event)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>
                            <img class="materialboxed" width="80px" height="50px"
                                src="{{ asset('/storage/uploads/' . $event->image_path) }}" alt="">
                        </td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->time }}</td>
                        <td>{{ $event->venue }}</td>
                        </td>
                        <td>{{ $event->created_at->format('d M Y H:i') ?? 'Not Set' }}</td>
                        <td>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-floating btn-small white">
                                <i class="material-icons black-text">edit</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
